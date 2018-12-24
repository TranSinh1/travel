<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckUserBlock
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
        if (User::isBlock(Auth::user()) == 'true') {

            return redirect()->route('view.block.user');
        }

        return $next($request);
    }
}
