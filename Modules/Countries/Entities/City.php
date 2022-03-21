<?php

namespace Modules\Countries\Entities;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateTimeZone;
use Modules\Countries\Traits\WorldTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

/**
 * City.
 */
class City extends Model
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
    protected $table = 'world_cities';

    /**
     * append names.
     *
     * @var array
     */
    protected $appends = ['local_name', 'local_full_name', 'local_alias', 'local_abbr'];

    protected $fillable = ['name'];

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
            'world_cities.id' => 10,
            'world_cities.name' => 10,
            'world_countries.name' => 10,
        ],
        'joins' => [
            'world_countries' => ['world_cities.country_id', 'world_countries.id'],
        ],
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function children()
    {
        return null;
    }

    public function parent()
    {
        if ($this->division_id === null) {
            return $this->country;
        }
        return $this->division;
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function locales()
    {
        return $this->hasMany(CityLocale::class);
    }

    /**
     * Get timezone abbreviation.
     *
     * @param string $iana_timezone
     *
     * @return string
     */
    public static function timezoneAbbrev($iana_timezone)
    {
        if (empty($iana_timezone)) return '';
        if (!in_array($iana_timezone, timezone_identifiers_list(),true)) return '';

        $dateTime = new DateTime();
        $dateTime->setTimeZone(new DateTimeZone($iana_timezone));
        return $dateTime->format('T');
    }

    /**
     * Get GMT timezone offset.
     *
     * @param string $iana_timezone
     *
     * @return string
     */
    public static function timezoneOffset($iana_timezone)
    {
        if (empty($iana_timezone)) return '';
        if (!in_array($iana_timezone, timezone_identifiers_list(),true)) return '';

        $zones = timezone_identifiers_list();

        $dateTimeZone = new DateTimeZone($iana_timezone);
        $timeInCity = new DateTime('now', $dateTimeZone);
        $offset = $dateTimeZone->getOffset( $timeInCity ) / 3600;
        return "GMT" . ($offset < 0 ? $offset : "+".$offset);
    }

    /**
     * Get City by name.
     *
     * @param string $name
     *
     * @return collection
     */
    public static function getByName($name)
    {
        $localed = CityLocale::where('name', $name)->first();
        if (is_null($localed)) {
            return $localed;
        }
        return $localed->city;
    }

    /**
     * Search City by name.
     *
     * @param string $name
     *
     * @return collection
     */
    public static function searchByName($name)
    {
        return CityLocale::where('name', 'like', '%' . $name . '%')
            ->get()->map(function ($item) {
                return $item->city;
            });
    }
}
