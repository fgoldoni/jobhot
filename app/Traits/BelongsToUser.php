<?php
namespace App\Traits;

use App\Models\User;

/**
 * Class BelongsToUser
 *
 * @package \App\Traits
 */
trait BelongsToUser
{
    /**
     * Wishes belongsTo with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
