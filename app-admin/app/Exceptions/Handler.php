<?php

namespace App\Admin\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof AuthorizationException) {
            if ($request->is('api/*')) {
                $error = $exception->getMessage() ?: '您没有权限操作';
                $code = $exception->getCode() ?: 401;
                return response()->json([
                    'code' => $code,
                    'msg'  => 'error',
                    'data' => $error,
                ]);
            }
        }
        return parent::render($request, $exception);
    }


    protected function invalidJson($request, ValidationException $exception)
    {
        $error = collect($exception->errors())->first();
        if (is_array($error)) {
            $error = $error[0];
        }
        return response()->json([
            'code' => 10010,
            'msg'  => 'error',
            'data' => $error,
        ], $exception->status);
    }
}
