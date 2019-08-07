<?php

namespace App\Http\Middleware;

use Closure;

class CookieMiddleware
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
        if(isset($_GET['lang'])){
            $str = ltrim($_GET['lang']);
        }else{
            $str = 'RUS';
        }
        setcookie('lang', $str, time()+3600);
        return $next($request);
    }
}
