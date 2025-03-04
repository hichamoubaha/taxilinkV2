<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PassengerOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->hasRole('passenger')) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}