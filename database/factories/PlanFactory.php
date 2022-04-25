<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Plans\Entities\Plan;
use Modules\Settings\Entities\Setting;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'key' => $this->faker->uuid,
            'description' => $this->faker->sentence,
        ];
    }
}
