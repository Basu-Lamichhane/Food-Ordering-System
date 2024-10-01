<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KitchenDelivery
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role != 1 && auth()->user()->role != 2 && auth()->user()->role != 3)
            return abort(403);
        return $next($request);
    }
}
