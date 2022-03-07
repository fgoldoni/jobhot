<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasSlug, HasTranslations, SearchableTrait;

    public $guarded = [];

    public $translatable = ['name'];

    protected $casts = [
        'slug' => 'string',
        'online' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'categories.id' => 10,
            'categories.name' => 10,
        ]
    ];


    public function entries(string $class): MorphToMany
    {
        return $this->morphedByMany($class, 'categorizable', 'categorizables', 'category_id', 'categorizable_id', 'id', 'id');
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
