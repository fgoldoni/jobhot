<?php
namespace App\Http\Controllers\Teamwork;

use Illuminate\Routing\Controller;
use Mpociot\Teamwork\Facades\Teamwork;

class AuthController extends Controller
{
    /**
     * Accept the given invite.
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function acceptInvite($token)
    {
        $invite = Teamwork::getInviteFromAcceptToken($token);
        if (!$invite) {
            abort(404);
        }

        if (auth()->check()) {
            Teamwork::acceptInvite($invite);

            session()->put('flash.banner', 'Great! You have accepted the invitation to join the ' . $invite->team->name . ' team. ');

            return redirect('/');
        } else {
            session(['invite_token' => $token]);

            return redirect()->to('login');
        }
    }
}
