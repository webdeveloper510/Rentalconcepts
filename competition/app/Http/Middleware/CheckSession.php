<?php

// Middleware to check if user is still authenticated
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Optionally, you could invalidate the session here as well
            $request->session()->invalidate();
            return redirect('/login');  // Redirect to login if user is not authenticated
        }

        return $next($request);
    }
}
