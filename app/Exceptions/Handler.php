<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $guard = $exception->guards()[0] ?? null;

        switch ($guard) {
            case 'siakad':
                $loginRoute = 'siakad.login';
                break;
            case 'presmalance':
                $loginRoute = 'presmalance.login';
                break;
            case 'pressmaboard':
                $loginRoute = 'pressmaboard.login';
                break;
            default:
                $loginRoute = 'login'; // fallback ke default
                break;
        }

        return redirect()->guest(route($loginRoute));
    }
}
