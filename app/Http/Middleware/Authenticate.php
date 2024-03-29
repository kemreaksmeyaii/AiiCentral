<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        if (session()->has('AuthToken') == false) {
            return redirect('login');
        }
        return $next($request);

    }
}
