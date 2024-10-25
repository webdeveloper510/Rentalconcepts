<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
class AutoLogin
{
    public function handle($request, Closure $next)
    {
        // Check if the user is already authenticated
        if (!Auth::check()) {
            // Check if the session has 'userloginid'
            if (session()->has('userloginid')) {
                // Retrieve the user by ID stored in the session
                $user = User::find(session('userloginid'));

                // Log in the user without a password check
                if ($user) {
                    Auth::login($user);
                }
            } else {
                // Redirect to the main site if no session exists
                return redirect('http://rentalconcepts.net/');
            }
        }

        return $next($request);
    }
}
