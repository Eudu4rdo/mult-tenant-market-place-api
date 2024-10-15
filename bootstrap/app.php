<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {
            if($e instanceof ValidationException)
                return response()->json(['errors' => $e->errors()])->setStatusCode(422);

            if($e instanceof NotFoundHttpException)
                return response()->json(['error' => $e->getMessage()])->setStatusCode(404);

            return response()->json(['error' => $e->getMessage()])->setStatusCode(500);
        });
    })->create();
