<?php

namespace Database\Seeders;

use App\Models\Job;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Job::factory(10)->create(['created_at' => $faker->dateTimeInInterval('now', '-1 days')]);
        Job::factory(50)->create(['created_at' => $faker->dateTimeInInterval('-1 days', '-2 days')]);
        Job::factory(50)->create(['created_at' => $faker->dateTimeInInterval('-2 days', '-7 days')]);
        Job::factory(50)->create(['created_at' => $faker->dateTimeInInterval('-7 days', '-30 days')]);
        Job::factory(50)->create(['created_at' => $faker->dateTimeInInterval('-30 days', '-60 days')]);
    }
}
