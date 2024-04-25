<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiveUserMiddleware
{
  public function handle(Request $request, Closure $next)
  {
    if (Auth::check() && !Auth::user()->isActive()) {
      Auth::logout();

      return redirect()->route('login')->with('status', 'Your account is inactive. Please contact the administrator.');
    }

    return $next($request);
  }
}
