<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure $next
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        $routeName = $request->route()->getName();

        if (in_array($routeName, ['menu.index', 'sousmenu.index', 'page.index'])) {
            return $next($request);
        }

        return redirect('/login');
    }
}
