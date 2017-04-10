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
        $session = $request->session()->get('home');
        if (empty($session))
        {
            return redirect('/');
        }
        return $next($request);
    }
}
