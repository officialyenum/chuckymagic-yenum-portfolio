<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
        \Illuminate\Bus\Validation\ValidationException::class
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $errors = $exception->validator->errors()->getMessages();
            $data = response()->json($errors, 422);
            return $this->errorResponse($data, 422);
        }

        if ($exception instanceof ModelNotFoundException) {
            # code...
            $modelName = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("Does not exists any {$modelName} with the specified identificator", 404);
        }

        if ($exception instanceof AuthenticationException) {
            # code...
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof AuthorizationException) {
            # code...
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof NotFoundHttpException) {
            # code...
            return $this->errorResponse('The specified url cannot be found', 404);
        }

        if ($exception instanceof NotFoundResourceException) {
            # code...
            return $this->errorResponse($exception->getMessage(), 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            # code...
            return $this->errorResponse('The specified method for the request is invalid', 405);
        }

        if ($exception instanceof HttpException) {
            # code...
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof NotFoundResourceException) {
            # code...
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof QueryException) {
            # code...
            $errorCode = $exception->errorInfo[1];
            if ($errorCode == 1451) {
                # code...
                return $this->errorResponse('Cannot remove this resource permanently. It is related with any other resource', 409);
            }
        }

        if (config('app.debug')) {
            # code...
            return parent::render($request, $exception);
        }

        return $this->errorResponse('Unexpected Exception. Try Later', 500);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $this->errorResponse('Unauthenticated', 401);
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
}
