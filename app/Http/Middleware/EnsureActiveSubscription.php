<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class EnsureActiveSubscription
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow guests through; we only gate logged-in users without subscriptions
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        if (method_exists($user, 'hasActiveSubscription') && $user->hasActiveSubscription()) {
            return $next($request);
        }

        return redirect()->route('pricing')
            ->with('success', 'Please purchase a subscription plan to access product pages.');
    }
}


