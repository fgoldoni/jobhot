<?php
namespace App\Traits;

trait WithinDays
{
    public function scopeRegisteredWithinDays($query, $days)
    {
        return $query->where('created_at', '>=', now()->subDays($days)->startOfDay());
    }
}
