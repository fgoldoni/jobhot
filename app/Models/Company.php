<?php

namespace App\Models;

use App\Enums\CompanyState;
use App\Traits\BelongsToTenant;
use App\Traits\BelongsToUser;
use App\Traits\Categorizable;
use App\Traits\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, Categorizable, BelongsToTenant, HasAvatar, BelongsToUser;

    protected $casts = [
        'state' => CompanyState::class
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar_url',
    ];
}
