<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class Maintain
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
        $config=DB::table('config')
            ->first();
        if($config->status==2){
            return redirect('/status');
        }else{
            return $next($request);
        }


    }
}
