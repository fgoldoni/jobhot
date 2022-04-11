<?php

namespace Database\Factories;

use App\Enums\JobState;
use App\Enums\SalaryType;
use App\Models\Company;
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
            'phone' => $this->faker->phoneNumber,
            'view_count' => $this->faker->numberBetween(0, 100),
            'content' => $this->faker->sentence(100),
            'user_id' => $this->faker->numberBetween(1, 10),
            'team_id' => $this->faker->numberBetween(1, 5),
            'country_id' => $this->faker->numberBetween(1, 200),
            'state' => $this->faker->randomElement([JobState::Draft, JobState::Published, JobState::Archived, JobState::Hold]),
            'salary_type' => $this->faker->randomElement([SalaryType::Day, SalaryType::Hour, SalaryType::Month, SalaryType::Year]),
            'closing_to' => $this->faker->dateTimeInInterval('now', '+30 days'),
            'urgent_to' => $this->faker->randomElement([$this->faker->dateTimeInInterval('now', '+30 days'), null, null, null, null]),
            'highlight_to' => $this->faker->randomElement([$this->faker->dateTimeInInterval('now', '+30 days'), null, null, null, null]),
            'live_at' => $this->faker->randomElement([$this->faker->dateTimeInInterval('-5 days', 'now'), null]),
            'experience' => $this->faker->numberBetween(1,5),
            'salary_min' => $this->faker->randomElement([38000, 40000, 45000, 50000, 55000, 60000, 65000]),
            'salary_max' => $this->faker->randomElement([70000, 75000, 80000, 85000, 90000]),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Job $job) {
            //
        })->afterCreating(function (Job $job) {
            $job->syncCategories([$this->faker->numberBetween(1, 10)]);
            $job->company_id = Company::where('team_id', $job->team_id)->inRandomOrder()->first()->id;
            $job->save();
        });
    }

}
