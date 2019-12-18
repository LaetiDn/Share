<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Traits\HasRoles;

class VerifyIsAdmin
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
        if (!auth()->user()->hasRole('Admin')) {
                return redirect(route('home'));
        }

        return $next($request);
    }
}
