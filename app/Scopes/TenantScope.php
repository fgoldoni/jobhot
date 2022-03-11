<?php


namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->when(session()->get('tenant_id'), fn($query, $tenantId) => $query->where('tenant_id', $tenantId));
    }
}
