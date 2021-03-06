<?php
namespace App\Models;

use App\Builders\CompanyBuilder;
use App\Enums\CompanyState;
use App\Traits\BelongsToUser;
use App\Traits\Categorizable;
use App\Traits\HasAvatar;
use App\Traits\HasTeams;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JetBrains\PhpStorm\Pure;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string|null $content
 * @property string|null $email
 * @property string|null $phone
 * @property CompanyState $state
 * @property string|null $avatar_path
 * @property int $user_id
 * @property int|null $tenant_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read string $avatar_url
 * @property-read \App\Models\Tenant|null $tenant
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CompanyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withAllCategories($categories)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withAnyCategories($categories)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withCategories($categories)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withoutAnyCategories()
 * @method static \Illuminate\Database\Eloquent\Builder|Company withoutCategories($categories)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Company search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Company searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Query\Builder|Company onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|Company withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Company withoutTrashed()
 * @property int|null $team_id
 * @property-read \App\Models\Team|null $team
 * @method static \Illuminate\Database\Eloquent\Builder|Company allTeams()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTeamId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property string $slug
 * @property-read mixed $created_at_formatted
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSlug($value)
 * @property \Illuminate\Support\Carbon|null $live_at
 * @property-read bool|null $is_new
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereLiveAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company withTeam()
 * @method static CompanyBuilder|Company inTeam()
 * @method static CompanyBuilder|Company published()
 */
class Company extends Model
{
    use HasFactory, HasSlug, Categorizable, HasAvatar, BelongsToUser, SearchableTrait, SoftDeletes, HasTeams;

    protected $guarded = [];

    protected $casts = [
        'state' => CompanyState::class
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
        'is_new',
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
            'companies.id' => 10,
            'companies.name' => 10,
            'companies.email' => 10,
            'companies.content' => 5,
            'companies.state' => 5,
        ]
    ];

    public function jobs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    public function getIsNewAttribute(): ?bool
    {
        return $this->live_at?->isToday();
    }

    protected function defaultAvatarUrl(): string
    {
        return asset('default/profile-banner.png');
    }

    #[Pure]
     public function newEloquentBuilder($query): Builder
     {
         return new CompanyBuilder($query);
     }
}
