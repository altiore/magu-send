<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param   \App\User $user
     * @return mixed
     */

    public function handle(User $user, $request, Closure $next)
    {
        if(! $request->$user->isAdmin()) {
            return redirect('home');
        }
        return $next($request);
    }
}
