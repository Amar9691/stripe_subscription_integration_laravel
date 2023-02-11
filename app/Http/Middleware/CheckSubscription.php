<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckSubscription
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
        if($request->user() && !$request->user()->subscribed('main'))
        {
            return redirect('/planselect');
        }
        return $next($request);
    }
}
