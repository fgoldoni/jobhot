<?php
namespace App\Traits;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

trait HasTeams
{
    /**
     * Boot the global scope.
     */
    protected static function bootHasTeams()
    {
        static::saving(function (Model $model) {
            if (!isset($model->team_id)) {
                static::teamGuard();

                $model->team_id = auth()->user()->currentTeam->getKey();
            }
        });
    }

    public function scopeAllTeams(Builder $query)
    {
        return $query->withoutGlobalScope('team');
    }

    public function team()
    {
        return $this->belongsTo(Config::get('teamwork.team_model'));
    }
    public function scopeWithTeam($query)
    {
        static::teamGuard();

        $query->where($query->getQuery()->from . '.team_id', auth()->user()->currentTeam->getKey());
    }


    protected static function teamGuard()
    {
        if (auth()->guest() || !auth()->user()->currentTeam) {
            throw new Exception('No authenticated user with selected team present.');
        }
    }
}
