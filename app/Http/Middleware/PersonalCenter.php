<?php

namespace App\Http\Middleware;

use Closure;

class PersonalCenter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(session('home'))) {
            return redirect('/home/login');
        }
        return $next($request);
    }
}
