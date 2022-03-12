<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,
            'content' => $this->faker->sentence,
            'user_id' => $this->faker->numberBetween(1, 10),
            'tenant_id' => $this->faker->numberBetween(1,5),
            'company_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
