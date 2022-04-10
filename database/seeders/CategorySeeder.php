<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();
        Category::factory(5)->create(['type' => CategoryType::Industry]);
        Category::factory(5)->create(['type' => CategoryType::JobType]);
        Category::factory(5)->create(['type' => CategoryType::JobLevel]);
        Category::factory(5)->create(['type' => CategoryType::Gender]);
    }
}
