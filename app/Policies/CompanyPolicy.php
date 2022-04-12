<?php
namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Company $company): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Company $company): bool
    {
        return $user->current_team_id === (int) $company->team_id;
    }

    public function delete(User $user, Company $company): bool
    {
        return true;
    }

    public function restore(User $user, Company $company): bool
    {
        return true;
    }

    public function forceDelete(User $user, Company $company): bool
    {
        return true;
    }
}
