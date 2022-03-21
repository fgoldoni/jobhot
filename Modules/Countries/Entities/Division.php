<?php

namespace Modules\Countries\Entities;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Modules\Countries\Traits\WorldTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * Division
 */
class Division extends Model
{
    use WorldTrait, SearchableTrait;

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
    protected $table = 'world_divisions';

    /**
     * append names
     *
     * @var array
     */
    protected $appends = ['local_name','local_full_name','local_alias', 'local_abbr'];

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
            'world_divisions.id' => 10,
            'world_divisions.name' => 10,
            'world_countries.name' => 10,
        ],
        'joins' => [
            'world_countries' => ['world_divisions.country_id', 'world_countries.id'],
        ],
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function children()
    {
        return $this->cities;
    }

    public function parent()
    {
        return $this->country;
    }

    public function locales()
    {
        return $this->hasMany(DivisionLocale::class);
    }
    /**
     * Get Division by name
     *
     * @param string $name
     * @return collection
     */
    public static function getByName($name)
    {
        $localized = DivisionLocale::where('name', $name)->first();
        if (is_null($localized)) {
            return $localized;
        }
        return $localized->region;
    }

    /**
     * Search Division by name
     *
     * @param string $name
     * @return collection
     */
    public static function searchByName($name)
    {
        return DivisionLocale::where('name', 'like', "%" . $name . "%")
            ->get()->map(function ($item) {
                return $item->division;
            });
    }
}
