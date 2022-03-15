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

        $user = User::factory()->withPersonalTeam()->create(['name' => 'Admin SG', 'email' => 'admin@admin.com']);

        $user->assignRole(User::Administrator);

        $user = User::factory()->withPersonalTeam()->create(['name' => 'Executive SG', 'email' => 'fotsa.goldoni@yahoo.fr']);

        $user->assignRole(User::Executive);

        $users = User::factory(10)->withPersonalTeam()->create();

        foreach ($users as $user) {
            $user->assignRole('Executive');
        }

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $user->assignRole('User');
        }
    }
}
