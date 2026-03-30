<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class RoleAuth
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $guard = $role;

        if (Auth::guard($guard)->check()) {
            View::share([
                'notifications' => auth()->guard($guard)->user()->notifications,
                'unreadNotifications' => auth()->guard($guard)->user()->unreadNotifications,
            ]);

            return $next($request);
        }

        return redirect()->route($guard . '.login');
    }
}

