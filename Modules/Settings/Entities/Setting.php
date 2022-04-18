<?php

namespace Modules\Settings\Entities;

use Database\Factories\SettingFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [];

    protected static function newFactory()
    {
        return SettingFactory::new();
    }
}
