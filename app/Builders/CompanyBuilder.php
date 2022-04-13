<?php


namespace App\Builders;

use App\Enums\CategoryType;
use App\Enums\CompanyState;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CompanyBuilder
 *
 * @package \App\Builders
 */
class CompanyBuilder extends Builder
{
    public function inTeam(): self
    {
        static::teamGuard();

        $this->where($this->getQuery()->from . '.team_id', auth()->user()->currentTeam->getKey());

        return $this;
    }

    public function published(): self
    {
        $this->where($this->getQuery()->from . '.state', CompanyState::Published);

        return $this;
    }

    protected static function teamGuard()
    {
        if (auth()->guest() || !auth()->user()->currentTeam) {
            throw new Exception('No authenticated user with selected team present.');
        }
    }
}
