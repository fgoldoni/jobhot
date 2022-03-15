<?php
namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Mpociot\Teamwork\Exceptions\UserNotInTeamException;
use Mpociot\Teamwork\Teamwork;

class TeamController extends Controller
{
    /**
     * @var \Mpociot\Teamwork\Teamwork
     */
    private Teamwork $teamwork;
    /**
     * @var \Illuminate\Auth\AuthManager
     */
    private AuthManager $authManager;

    public function __construct(Teamwork $teamwork, AuthManager $authManager)
    {
        $this->teamwork = $teamwork;

        $this->authManager = $authManager;
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($request->team_id);

        try {
            $this->authManager->user()->switchTeam($team);
        } catch (UserNotInTeamException $e) {
            abort(403);
        }

        return back();
    }

    public function acceptInvite($token)
    {
        $invite = $this->teamwork->getInviteFromAcceptToken($token);

        if (!$invite) {
            abort(404);
        }

        if ($this->authManager->check()) {

            $this->teamwork->acceptInvite($invite);

            session()->put('flash.banner', __('Great! You have accepted the invitation to join the :team.', ['team' => $invite->team->name]));

            return redirect()->route('admin.teams');
        } else {
            session(['invite_token' => $token]);

            return redirect()->to('login');
        }
    }
}
