<?php
namespace App\Builders;

use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CategoryBuilder
 *
 * @package \App\Builders
 */
class CategoryBuilder extends Builder
{
    public function area(): self
    {
        $this->where('type', CategoryType::Area);

        return $this;
    }

    public function type(CategoryType $type): self
    {
        $this->where('type', $type);

        return $this;
    }

    public function published(): self
    {
        $this->where('online', true);

        return $this;
    }

    public function positionAsc(): self
    {
        $this->orderBy('position');

        return $this;
    }

    public function industry(): self
    {
        $this->where('type', CategoryType::Industry);

        return $this;
    }
}
