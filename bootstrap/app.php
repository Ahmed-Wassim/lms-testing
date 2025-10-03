<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->reportable(function (Throwable $e) {
            // Log exceptions globally
            \Log::error($e->getMessage(), ['trace' => $e->getTraceAsString()]);
        });

        $exceptions->renderable(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Resource not found'], 404);
            }
            return response()->view('dashboard.errors.404', [], 404);

        });

        $exceptions->renderable(function (\Illuminate\Validation\ValidationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json(['error' => $e->errors()], 422);
            }
            return redirect()->back()->with('error', $e->getMessage());
        });

        $exceptions->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }
            return redirect()->guest(route('login')); // 👈 send dashboard users to login
        });

        $exceptions->renderable(function (\Exception $e, $request) {
            if ($request->expectsJson()) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
            return response()->view('dashboard.errors.500', ['message' => $e->getMessage()], 500);
        });
    })->create();
