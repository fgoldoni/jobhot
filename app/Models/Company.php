<?php

namespace App\Models;

use App\Enums\CompanyState;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, Categorizable;

    protected $casts = [
        'status' => CompanyState::class
    ];
}
