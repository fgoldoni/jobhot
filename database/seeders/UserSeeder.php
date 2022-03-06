<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $user = User::factory()->create(['name' => 'Admin SG', 'email' => 'admin@admin.com', 'tenant_id' => null]);

        $user->assignRole('Administrator');

        $user = User::factory()->create(['email' => 'fotsa.goldoni@yahoo.fr']);

        $user->assignRole('Executive');

        $users = User::factory(100)->create();

        foreach ($users as $user) {
            $user->assignRole('Executive');
        }

        $users = User::factory(100)->create();

        foreach ($users as $user) {
            $user->assignRole('User');
        }
    }
}
