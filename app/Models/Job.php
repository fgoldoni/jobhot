<?php
namespace App\Models;

use App\Builders\JobBuilder;
use App\Enums\JobState;
use App\Enums\SalaryType;
use App\Traits\BelongsToUser;
use App\Traits\Categorizable;
use App\Traits\HasAvatar;
use App\Traits\HasTeams;
use App\Traits\JobAttribute;
use App\Traits\WithinDays;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JetBrains\PhpStorm\Pure;
use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;
use Modules\Countries\Entities\Division;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Job
 *
 * @property int $id
 * @property int|null $tenant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\JobFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property array $name
 * @property string $slug
 * @property string|null $content
 * @property int $online
 * @property string|null $avatar_path
 * @property int $user_id
 * @property int $company_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property mixed $state
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read string $avatar_url
 * @property-read array $translations
 * @property-read \App\Models\Tenant|null $tenant
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|Job onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Job searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job withAllCategories($categories)
 * @method static \Illuminate\Database\Eloquent\Builder|Job withAnyCategories($categories)
 * @method static \Illuminate\Database\Eloquent\Builder|Job withCategories($categories)
 * @method static \Illuminate\Database\Query\Builder|Job withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job withoutAnyCategories()
 * @method static \Illuminate\Database\Eloquent\Builder|Job withoutCategories($categories)
 * @method static \Illuminate\Database\Query\Builder|Job withoutTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereState($value)
 * @property-read \App\Models\Company|null $company
 * @property int|null $team_id
 * @property-read \App\Models\Team|null $team
 * @method static \Illuminate\Database\Eloquent\Builder|Job allTeams()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereTeamId($value)
 * @property int|null $country_id
 * @property int|null $division_id
 * @property int|null $city_id
 * @property \Illuminate\Support\Carbon $closing_to
 * @property \Illuminate\Support\Carbon|null $featured_to
 * @property \Illuminate\Support\Carbon|null $urgent_to
 * @property \Illuminate\Support\Carbon|null $highlight_to
 * @property-read City|null $city
 * @property-read Country|null $country
 * @property-read Division|null $division
 * @property-read mixed $closing_to_formatted
 * @property-read bool $highlight
 * @method static \Illuminate\Database\Eloquent\Builder|Job published()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereClosingTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereFeaturedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereHighlightTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUrgentTo($value)
 * @property \Illuminate\Support\Carbon|null $live_at
 * @property-read mixed $created_at_formatted
 * @property-read mixed $live_at_formatted
 * @property-read bool $new
 * @method static \Illuminate\Database\Eloquent\Builder|Job liveWithinDays($days)
 * @method static \Illuminate\Database\Eloquent\Builder|Job registeredWithinDays($days)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereLiveAt($value)
 * @property string|null $phone
 * @property int|null $experience
 * @property int|null $salary_min
 * @property int|null $salary_max
 * @property SalaryType $salary_type
 * @property int $negotiable
 * @property string|null $iframe
 * @property int $view_count
 * @property mixed $closing_to_for_editing
 * @property-read bool|null $urgent
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereIframe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereNegotiable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSalaryType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereViewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job withTeam()
 * @method static JobBuilder|Job inTeam()
 */
class Job extends Model
{
    use HasFactory, HasSlug, HasTranslations, Categorizable, HasAvatar, BelongsToUser, SearchableTrait, SoftDeletes, WithinDays, JobAttribute, HasTeams;

    protected $guarded = [];

    public array $translatable = ['name'];

    protected $casts = [
        'state' => JobState::class,
        'salary_type' => SalaryType::class,
        'closing_to' => 'date',
        'featured_to' => 'date',
        'urgent_to' => 'date',
        'highlight_to' => 'date',
    ];

    protected $dates = [
        'live_at'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar_url',
        'created_at_formatted',
        'live_at_formatted',
        'urgent',
        'highlight',
        'closing_to_for_editing',
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
            'jobs.id' => 10,
            'jobs.name' => 10,
            'world_countries.name' => 2,
            'world_cities.name' => 2,
            'world_divisions.name' => 2,
        ],
        'joins' => [
            'world_countries' => ['jobs.country_id', 'world_countries.id'],
            'world_divisions' => ['jobs.division_id', 'world_divisions.id'],
            'world_cities' => ['jobs.city_id', 'world_cities.id'],
        ],
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function toArray(): array
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, app()->getLocale());
        }
        return $attributes;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class)->withDefault(['name' => '']);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class)->withDefault(['name' => '']);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class)->withDefault(['name' => '']);
    }

    public function scopePublished($query)
    {
        return $query->where('state', JobState::Published);
    }

    #[Pure]
    public function newEloquentBuilder($query): Builder
    {
        return new JobBuilder($query);
    }
}
