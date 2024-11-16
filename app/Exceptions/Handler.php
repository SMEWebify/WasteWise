<?php

namespace App\Exceptions;

use Throwable;
use Inertia\Inertia;
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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable   $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable  $exception)
    {
        // Gérer les erreurs 404 (page non trouvée)
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException || $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            if ($request->header('X-Inertia')) {
                return Inertia::render('Errors/404', ['status' => 404])
                    ->toResponse($request)
                    ->setStatusCode(404);
            } else {
                return parent::render($request, $exception);
            }
        }

        // Gérer les erreurs 500 (erreur serveur)
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() === 500) {
            if ($request->header('X-Inertia')) {
                return Inertia::render('Errors/500', ['status' => 500])
                    ->toResponse($request)
                    ->setStatusCode(500);
            } else {
                return parent::render($request, $exception);
            }
        }

        return parent::render($request, $exception);
    }
}
