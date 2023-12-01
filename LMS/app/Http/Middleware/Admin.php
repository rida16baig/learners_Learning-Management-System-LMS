<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Middleware;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role == 2) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}

