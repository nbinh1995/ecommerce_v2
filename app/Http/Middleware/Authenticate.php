<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{

    protected function unauthenticated($request, array $guards)
    {

        if ($guards[0] === 'admin') {
            throw new AuthenticationException(
                'Unauthenticated.',
                $guards,
                $this->redirectAdminTo($request)
            );
        } else {
            throw new AuthenticationException(
                'Unauthenticated.',
                $guards,
                $this->redirectTo($request)
            );
        }
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    protected function redirectAdminTo($request)
    {
        if (!$request->expectsJson()) {
            return route('admin.login');
        }
    }
}
