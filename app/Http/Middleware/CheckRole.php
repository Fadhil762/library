<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\SUpport\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if(Auth::check() && Auth::user()->role === $role){
            return $next($request);
        }
        return redirect()->route('books.index')->with('error','Unauthorized access');
    }
}
