<?php

use App\Models\User;

function is_impersonating(): bool
{
    return app('auth')->check()
        && app('auth')->user()->isImpersonated();
}

function can_impersonate(string $guard = null): bool
{
    return app('auth')->check()
        && app('auth')->user()->canImpersonate();
}

if (!function_exists('can_be_impersonated')) {
    /**
     * Check whether the specified user can be impersonated.
     *
     * @param  User  $user
     * @param  string|null      $guard
     * @return bool
     */
    function can_be_impersonated(User $user, string $guard = null): bool
    {
        return app('auth')->check()
            && app('auth')->user()->isNot($user)
            && $user->canBeImpersonated();
    }
}
