<?php


namespace App\Http\Livewire\Admin\Datatable;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

/**
 * Class WithRoles
 *
 * @package \App\Http\Livewire\Admin\Datatable
 */
trait WithRoles
{
    public ?int $selectedRole = null;

    public Collection $roles;

    public function mountWithRoles()
    {
        $this->roles = Role::all();
        $this->setDefaultRole();
    }

    private function setDefaultRole()
    {
        $role = $this->editing->roles()->first();

        $this->selectedRole = $role
            ? $role->id
            : $this->roles->firstWhere('name', 'User')->id;
    }
}
