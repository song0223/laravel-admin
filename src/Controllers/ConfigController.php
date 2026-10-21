<?php

namespace Encore\Admin\Controllers;

use Encore\Admin\Config\Config;
use Encore\Admin\Config\ConfigModel;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Validation\ValidationException;

class ConfigController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '数据库配置';

    /**
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ConfigModel());

        // extension metadata rows (configx's __configx__ etc.) are managed
        // by their own tools, not here; substr() instead of LIKE escapes for
        // cross-database correctness (sqlite treats \_ literally)
        $grid->model()->whereRaw("substr(name, 1, 2) <> '__'");

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '名称')->label();
        $grid->column('value', '值')->limit(60);
        $grid->column('description', '描述');
        $grid->column('updated_at', '更新时间');

        $grid->filter(function ($filter) {
            $filter->like('name', '名称');
            $filter->like('description', '描述');
        });

        $allowed = implode(' / ', Config::allowedPrefixes());

        $grid->tools(function ($tools) use ($allowed) {
            $tools->append("<span class='label label-warning'>仅允许前缀：{$allowed}</span>");
        });

        return $grid;
    }

    /**
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ConfigModel::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', '名称');
        $show->field('value', '值');
        $show->field('description', '描述');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    /**
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ConfigModel());

        $allowed = implode(' / ', Config::allowedPrefixes());

        $form->text('name', '名称')
            ->required()
            ->help("键名必须以白名单前缀开头：{$allowed}");
        $form->textarea('value', '值')->rows(4);
        $form->text('description', '描述');

        $form->saving(function (Form $form) {
            $name = (string) $form->input('name');

            // configx 等 reserved 元数据键不允许从这里创建/修改
            if (strpos($name, '__') === 0) {
                throw ValidationException::withMessages([
                    'name' => "保留键 [{$name}] 不允许在此编辑",
                ]);
            }
        });

        return $form;
    }
}
