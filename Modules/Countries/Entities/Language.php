<?php

namespace Modules\Countries\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Countries\Traits\WorldTrait;

/**
 * Language.
 */
class Language extends Model
{
    use WorldTrait;
    /**
     * The database table doesn't use 'created_at' and 'updated_at' so we disable it from Inserts/Updates.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'world_languages';
}
