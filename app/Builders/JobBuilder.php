<?php
namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class CompanyBuilder
 *
 * @package \App\Builders
 */
class JobBuilder extends Builder
{
    public function inTeam(): self
    {
        static::teamGuard();

        $this->where($this->getQuery()->from . '.team_id', auth()->user()->currentTeam->getKey());

        return $this;
    }

    protected static function teamGuard()
    {
        if (auth()->guest() || !auth()->user()->currentTeam) {
            throw new Exception('No authenticated user with selected team present.');
        }
    }
}
