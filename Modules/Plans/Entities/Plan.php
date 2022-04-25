<?php

namespace Modules\Plans\Entities;

use Database\Factories\PlanFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected static function newFactory()
    {
        return PlanFactory::new();
    }
}
