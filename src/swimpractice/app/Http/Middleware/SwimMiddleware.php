<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // userIdの取得
        $user_id = Auth::id();
        // 時間の変換
        $time = $request->minutes * 60 + $request->secound;

        // 情報のセット
        $request->merge(['time' => $time, 'user_id' => $user_id]);

        return $next($request);
    }
}
