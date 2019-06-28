<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
      if (auth()->user()->user_level == 2) {
        return $next($request);
      }
      session()->flash('error', 'You are not allowed to acces that page.');
      return redirect()->route('home');

    }
}
