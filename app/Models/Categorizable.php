<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\categorizable
 *
 * @property string $categorizable_type
 * @property int $categorizable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $category_id
 * @property-read \App\Models\Tenant $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable query()
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable whereCategorizableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable whereCategorizableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categorizable whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read Model|\Eloquent $categorizable
 */
class Categorizable extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function categorizable()
    {
        return $this->morphTo();
    }
}
