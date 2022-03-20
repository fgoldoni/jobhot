<?php
namespace App\Models;

use App\Enums\CategoryType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property array $name
 * @property string $slug
 * @property string $icon
 * @property CategoryType $type
 * @property int|null $position
 * @property int|null $parent_id
 * @property bool $online
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @method static Builder|Category area()
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static Builder|Category industry()
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static Builder|Category searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDeletedAt($value)
 * @method static Builder|Category whereIcon($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereOnline($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category wherePosition($value)
 * @method static Builder|Category whereSlug($value)
 * @method static Builder|Category whereType($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory, HasSlug, HasTranslations, SearchableTrait;

    public $guarded = [];

    public array $translatable = ['name'];

    protected $casts = [
        'slug' => 'string',
        'online' => 'boolean',
        'deleted_at' => 'datetime',
        'type' => CategoryType::class,
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

    public function toArray(): array
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, app()->getLocale());
        }
        return $attributes;
    }

    public function scopeArea(Builder $query): Builder
    {
        return $query->where('type', CategoryType::Area);
    }

    public function scopeIndustry(Builder $query): Builder
    {
        return $query->where('type', CategoryType::Industry);
    }

    protected static function boot()
    {
        parent::boot();

        Category::creating(function ($model) {
            $model->position = Category::max('position') + 1;
        });
    }
}
