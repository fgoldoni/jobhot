<?php

namespace App\Models;

use App\Enums\CompanyState;
use App\Traits\BelongsToTenant;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, Categorizable, BelongsToTenant;

    protected $casts = [
        'state' => CompanyState::class
    ];

    /**
     * Wishes belongsTo with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
