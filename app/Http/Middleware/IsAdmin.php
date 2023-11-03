<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    //    public function handle(Request $request, Closure $next)
    //    {
    //        return $next($request);
    //    }

    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->type == User::TYPE_ADMIN) {
            return $next($request);
        }

        return redirect(route('login'))->with('error', __('messages.unauthAccess'));
    }
}
