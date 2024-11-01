<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        // dd($user->role_name, $roles, in_array($user->role_name, $roles));
        if ($user && in_array($user->role_name, $roles)) {
            return $next($request);
        }
        
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página');
    }
}

