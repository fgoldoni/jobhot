<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsByRole = [

            'Administrator' => [
                'users:read',
                'users:update',
                'users:delete',
                'users:create',
                'roles:read',
                'roles:update',
                'roles:delete',
                'roles:create'
            ],

            'Executive' => ['impersonate', 'companies:create'],
            'User' => ['user', 'companies:read'],
        ];

        $insertPermissions = fn ($role) => collect($permissionsByRole[$role])
            ->map(fn ($name) => DB::table('permissions')->insertGetId(['name' => $name, 'guard_name' => 'web']))
            ->toArray();

        $permissionIdsByRole = [
            'Administrator' => $insertPermissions('Administrator'),
            'Executive' => $insertPermissions('Executive'),
            'User' => $insertPermissions('User')
        ];

        foreach ($permissionIdsByRole as $role => $permissionIds) {
            $role = Role::create(['name' => $role]);

            DB::table('role_has_permissions')
                ->insert(
                    collect($permissionIds)->map(fn ($id) =>
                    [
                        'role_id' => $role->id,
                        'permission_id' => $id
                    ])->toArray()
                );
        }
    }
}
