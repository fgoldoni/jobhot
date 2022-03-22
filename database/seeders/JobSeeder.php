<?php

namespace Database\Seeders;

use App\Enums\JobState;
use App\Models\Job;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Countries\Entities\City;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Job::factory(100)->state(function (array $attributes) {
            return ['city_id' =>  City::where('country_id', $attributes['country_id'])->inRandomOrder()->first()->id];
        })->create(['state' => JobState::Published,'live_at' => $faker->dateTimeInInterval('now', '-1 days')]);


        Job::factory(100)->state(function (array $attributes) {
            return ['city_id' =>  City::where('country_id', $attributes['country_id'])->inRandomOrder()->first()->id];
        })->create(['live_at' => $faker->dateTimeInInterval('-1 days', '-2 days')]);


        Job::factory(100)->state(function (array $attributes) {
            return ['city_id' =>  City::where('country_id', $attributes['country_id'])->inRandomOrder()->first()->id];
        })->create(['live_at' => $faker->dateTimeInInterval('-2 days', '-7 days')]);


        Job::factory(100)->state(function (array $attributes) {
            return ['city_id' =>  City::where('country_id', $attributes['country_id'])->inRandomOrder()->first()->id];
        })->create(['live_at' => $faker->dateTimeInInterval('-7 days', '-30 days')]);


        Job::factory(100)->state(function (array $attributes) {
            return ['city_id' =>  City::where('country_id', $attributes['country_id'])->inRandomOrder()->first()->id];
        })->create(['live_at' => $faker->dateTimeInInterval('-30 days', '-60 days')]);
    }
}
