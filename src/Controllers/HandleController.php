<?php

namespace Encore\Admin\Controllers;

use Encore\Admin\Actions\Action;
use Encore\Admin\Actions\GridAction;
use Encore\Admin\Actions\Response;
use Encore\Admin\Actions\RowAction;
use Encore\Admin\Widgets\Form;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

class HandleController extends Controller
{
    /**
     * [Security] 2026-10-14: 限制动态实例化只允许业务与框架自身的类。
     * _form_/_action_/selectable/renderable 四个入口原版可实例化任意类，
     * 已被攻击者利用为 RCE/SSRF 探测入口。
     */
    protected function assertAllowedClass($class)
    {
        if (strpos($class, 'App\\') !== 0 && strpos($class, 'Encore\\Admin\\') !== 0) {
            throw new Exception("Unauthorized class [{$class}].");
        }
    }

    /**
     * [Security] 2026-10-14: 这些入口未挂鉴权中间件，先验登录。
     */
    protected function assertAuthenticated()
    {
        if (!\Illuminate\Support\Facades\Auth::guard('admin')->check()) {
            abort(403, 'Unauthenticated.');
        }
    }

    /**
     * @param Request $request
     *
     * @return $this|mixed
     */
    public function handleForm(Request $request)
    {
        $this->assertAuthenticated();
        $form = $this->resolveForm($request);

        if ($errors = $form->validate($request)) {
            return back()->withInput()->withErrors($errors);
        }

        return $form->sanitize()->handle($request);
    }

    /**
     * @param Request $request
     *
     * @throws Exception
     *
     * @return Form
     */
    protected function resolveForm(Request $request)
    {
        if (!$request->has('_form_')) {
            throw new Exception('Invalid form request.');
        }

        $formClass = $request->get('_form_');
        $this->assertAllowedClass($formClass);

        if (!class_exists($formClass)) {
            throw new Exception("Form [{$formClass}] does not exist.");
        }

        /** @var Form $form */
        $form = app($formClass);

        if (!method_exists($form, 'handle')) {
            throw new Exception("Form method {$formClass}::handle() does not exist.");
        }

        return $form;
    }

    /**
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function handleAction(Request $request)
    {
        $this->assertAuthenticated();
        $action = $this->resolveActionInstance($request);

        $model = null;
        $arguments = [];

        if ($action instanceof GridAction) {
            $model = $action->retrieveModel($request);
            $arguments[] = $model;
        }

        if (!$action->passesAuthorization($model)) {
            return $action->failedAuthorization();
        }

        if ($action instanceof RowAction) {
            $action->setRow($model);
        }

        try {
            $response = $action->validate($request)->handle(
                ...$this->resolveActionArgs($request, ...$arguments)
            );
        } catch (Exception $exception) {
            return Response::withException($exception)->send();
        }

        if ($response instanceof Response) {
            return $response->send();
        }
    }

    /**
     * @param Request $request
     *
     * @throws Exception
     *
     * @return Action
     */
    protected function resolveActionInstance(Request $request)
    {
        if (!$request->has('_action')) {
            throw new Exception('Invalid action request.');
        }

        $actionClass = str_replace('_', '\\', $request->get('_action'));
        $this->assertAllowedClass($actionClass);

        if (!class_exists($actionClass)) {
            throw new Exception("Form [{$actionClass}] does not exist.");
        }

        /** @var GridAction $form */
        $action = app($actionClass);

        if (!method_exists($action, 'handle')) {
            throw new Exception("Action method {$actionClass}::handle() does not exist.");
        }

        return $action;
    }

    /**
     * @param Request               $request
     * @param Model|Collection|bool $model
     *
     * @return array
     */
    protected function resolveActionArgs(Request $request, $model = null)
    {
        $args = [$request];

        if (!empty($model)) {
            array_unshift($args, $model);
        }

        return $args;
    }

    /**
     * @param Request $request
     *
     * @return mixed|string|string[]
     */
    public function handleSelectable(Request $request)
    {
        $this->assertAuthenticated();
        $class = $request->get('selectable');
        $args = $request->get('args', []);

        $class = str_replace('_', '\\', $class);
        $this->assertAllowedClass($class);

        if (class_exists($class)) {
            /** @var \Encore\Admin\Grid\Selectable $selectable */
            $selectable = new $class(...array_values($args));

            return $selectable->render();
        }

        return $class;
    }

    /**
     * @param Request $request
     *
     * @return mixed|string|string[]
     */
    public function handleRenderable(Request $request)
    {
        $this->assertAuthenticated();
        $class = $request->get('renderable');
        $key = $request->get('key');

        $class = str_replace('_', '\\', $class);
        $this->assertAllowedClass($class);

        if (class_exists($class)) {
            /** @var Renderable $selectable */
            $renderable = new $class();

            return $renderable->render($key);
        }

        return $class;
    }
}
