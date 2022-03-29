<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\Auth\AuthManager;

class ImpersonationController extends Controller
{
    /**
     * @var \Illuminate\Auth\AuthManager
     */
    private AuthManager $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    public function take(int $userId)
    {
        $originalId = $this->auth->user()->id;

        $this->auth->logout();

        session()->flush();

        $this->auth->loginUsingId($userId, true);

        session()->put($this->getSessionKey(), $originalId);

        session()->put('flash.banner', 'You are impersonating ' . User::find($userId)->name);

        return redirect($this->getTakeRedirectTo());
    }

    public function leave()
    {
        if (!session()->has($this->getSessionKey())) {
            abort(403);
        }

        $this->auth->login(User::withoutGlobalScope(TenantScope::class)->find(session()->get($this->getSessionKey())));

        session()->forget([$this->getSessionKey(), 'flash.banner']);

        return redirect($this->getLeaveRedirectTo());
    }

    public function getSessionKey(): string
    {
        return config('impersonate.session_key');
    }

    public function getTakeRedirectTo(): string
    {
        try {
            $uri = route(config('impersonate.take_redirect_to'));
        } catch (\InvalidArgumentException $e) {
            $uri = '/';
        }

        return $uri;
    }

    public function getLeaveRedirectTo(): string
    {
        try {
            $uri = route(config('impersonate.leave_redirect_to'));
        } catch (\InvalidArgumentException $e) {
            $uri = '/';
        }

        return $uri;
    }
}
