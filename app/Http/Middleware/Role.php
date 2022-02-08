<?php

namespace App\Http\Middleware;

use App\Models\Role as ModelsRole;
use Closure;
use Illuminate\Http\Request;

class Role
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
        if (auth()->user()->role_id == ModelsRole::ADMIN) {
            return $next($request);
        }
        auth()->logout();
        return redirect('/login')->with('error', 'Permission Denied!!! You do not have administrative access.');
    }
}
