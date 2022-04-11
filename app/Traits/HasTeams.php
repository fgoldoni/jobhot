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
        if (auth()->check() && auth()->user()->hasRole(User::Executive)) {
            static::addGlobalScope('team', function (Builder $builder) {
                static::teamGuard();

                $builder->where($builder->getQuery()->from . '.team_id', auth()->user()->currentTeam->getKey());
            });

            static::saving(function (Model $model) {
                if (!isset($model->team_id)) {
                    static::teamGuard();

                    $model->team_id = auth()->user()->currentTeam->getKey();
                }
            });
        }
    }

    public function scopeAllTeams(Builder $query)
    {
        return $query->withoutGlobalScope('team');
    }

    public function team()
    {
        return $this->belongsTo(Config::get('teamwork.team_model'));
    }

    protected static function teamGuard()
    {
        if (auth()->guest() || !auth()->user()->currentTeam) {
            throw new Exception('No authenticated user with selected team present.');
        }
    }
}
