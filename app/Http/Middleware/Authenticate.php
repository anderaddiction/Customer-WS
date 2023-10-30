<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $is_api_request = in_array('api', $request->route()->getAction('middleware'));
        if (!$request->expectsJson()) {
            if ($is_api_request) {
                return route('api.unauthorized');
            } else {
                return route('login');
            }
        }
    }
}
