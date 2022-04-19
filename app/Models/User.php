<?php
namespace App\Models;

use App\Traits\HasAvatar;
use App\Traits\Impersonate;
use App\Traits\WithinDays;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int|null $tenant_id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $avatar_path
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $avatar_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Tenant|null $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $current_team_id
 * @property-read \App\Models\Team|null $currentTeam
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mpociot\Teamwork\TeamInvite[] $invites
 * @property-read int|null $invites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User registeredWithinDays($days)
 * @method static \Illuminate\Database\Eloquent\Builder|User liveWithinDays($days)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Impersonate, HasAvatar, UserHasTeams, WithinDays, SearchableTrait, SoftDeletes, LogsActivity, Billable;

    const Administrator = 'Administrator';

    const Executive = 'Executive';

    const User = 'User';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar_url',
    ];

    protected $searchable = [
        'columns' => [
            'users.id' => 10,
            'users.name' => 10,
            'users.email' => 10,
        ]
    ];

    /**
     * Determine if the given team is the current team.
     *
     * @param  mixed  $team
     * @return bool
     */
    public function isCurrentTeam($team)
    {
        return $team->id === $this->currentTeam->id;
    }

    public function currentTeam(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        if (is_null($this->current_team_id) && $this->getKey()) {
            $this->switchTeam($this->personalTeam());
        }

        return $this->hasOne(Config::get('teamwork.team_model'), 'id', 'current_team_id');
    }

    public function personalTeam(): Team
    {
        return $this->ownedTeams()->where('personal_team', true)->first();
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    public function lastLogin()
    {
        return $this->hasOne(Login::class)->latestOfMany('logged_in_at');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
