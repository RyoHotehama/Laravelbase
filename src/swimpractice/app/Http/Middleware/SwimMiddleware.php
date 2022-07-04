<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SwimMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 時間の変換
        $time = $request->minutes * 60 + $request->secound;
        $request->merge(['time' => $time]);

        return $next($request);
    }
}
