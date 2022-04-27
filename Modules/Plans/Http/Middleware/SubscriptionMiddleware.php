<?php

namespace Modules\Plans\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->guest() && !auth()->user()->subscribed() && !auth()->user()->onTrial() && auth()->user()->hasRole(\App\Models\User::Executive)) {

            session()->put('flash.banner', 'You no longer have an active subscription');
            session()->put('flash.bannerStyle', 'warning');
            session()->put('flash.bannerUrl', route('settings.billing'));

            return redirect()->route('settings.billing')->with(['alert' => 'You no longer have an active subscription', 'type' => 'warning']);
        }

        return $next($request);
    }
}
