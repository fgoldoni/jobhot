<?php

namespace Database\Factories;

use App\Enums\JobState;
use App\Models\Job;
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
            'content' => $this->faker->sentence(100),
            'user_id' => $this->faker->numberBetween(1, 10),
            'team_id' => $this->faker->numberBetween(1, 5),
            'state' => $this->faker->randomElement([JobState::Draft, JobState::Published, JobState::Archived, JobState::Hold]),
            'closing_to' => $this->faker->dateTimeInInterval('now', '+30 days'),
            'urgent_to' => $this->faker->randomElement([$this->faker->dateTimeInInterval('now', '+30 days'), null, null, null, null]),
            'highlight_to' => $this->faker->randomElement([$this->faker->dateTimeInInterval('now', '+30 days'), null, null, null, null]),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Job $job) {
            //
        })->afterCreating(function (Job $job) {
            $job->syncCategories([$this->faker->numberBetween(1, 16)]);
        });
    }

}
