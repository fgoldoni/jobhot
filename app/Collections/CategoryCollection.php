<?php
namespace App\Collections;

use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ProductCollection
 *
 * @package \App\Collection
 */
class CategoryCollection extends Collection
{
    public function areas(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::Area);
    }

    public function industries(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::Industry);
    }

    public function jobTypes(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::JobType);
    }

    public function jobLevels(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::JobLevel);
    }

    public function genders(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::Gender);
    }

    public function benefits(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::Benefit);
    }

    public function responsibilities(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::Responsibility);
    }

    public function skills(): self
    {
        return $this->filter(fn ($category) => $category->type === CategoryType::Skill);
    }
}
