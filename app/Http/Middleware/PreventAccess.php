<?php

namespace App\Http\Middleware;

use Closure;

class PreventAccess
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
        if(!Session()->get('userName')){
            return redirect('/admin');
        }
        return $next($request);
    }
}
