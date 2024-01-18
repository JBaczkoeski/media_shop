<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check())
            return redirect('/logowanie');

        $user = Auth::user();

        if($user->hasAnyRole($roles))
            return $next($request);

        return redirect('/logowanie');
    }
}