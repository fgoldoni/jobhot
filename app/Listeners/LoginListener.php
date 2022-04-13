<?php

namespace App\Listeners;


class LoginListener
{
    public function handle($event)
    {
        $event->user->logins()->create([
            'logged_in_at' => now(),
            'logged_in_ip' => request()->getClientIp()
        ]);
    }
}
