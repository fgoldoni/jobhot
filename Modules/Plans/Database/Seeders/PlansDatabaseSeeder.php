<?php

namespace Modules\Plans\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Plans\Entities\Plan;

class PlansDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Plan::factory()->create(['name' => 'basic', 'price' => 7, 'key' => 'price_1KqBoGGyro9wqcXwIzLk59iq']);

        Plan::factory()->create(['name' => 'plus', 'price' => 15, 'key' => 'price_1KqbV6Gyro9wqcXwpe2Gkn6D']);

        Plan::factory()->create(['name' => 'pro', 'price' => 20, 'key' => 'price_1KqbVxGyro9wqcXwSzY6owey']);
    }
}
