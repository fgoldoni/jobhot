<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpociot\Teamwork\Exceptions\UserNotInTeamException;

class TeamController extends Controller
{
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $teamModel = config('teamwork.team_model');
            $team = $teamModel::findOrFail($request->team_id);
            auth()->user()->switchTeam($team);

        } catch (UserNotInTeamException $e) {
            abort(403);
        }

        return back();
    }
}
