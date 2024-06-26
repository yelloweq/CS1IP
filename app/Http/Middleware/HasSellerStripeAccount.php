<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mauricius\LaravelHtmx\Http\HtmxResponseClientRedirect;
use Symfony\Component\HttpFoundation\Response;

class HasSellerStripeAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (is_null($user->stripe_account_id)) {
            return redirect()->route('create.express');
        }
        return $next($request);
    }
}
