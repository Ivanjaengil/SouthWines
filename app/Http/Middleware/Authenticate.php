<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        if ($this->auth->user()->estado !== 'aprobado') {
            auth()->logout();
            return redirect()->route('login')->with('error', 'Su cuenta está pendiente de aprobación.');
        }

        return $next($request);
    }
} 