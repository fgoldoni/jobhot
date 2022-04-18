<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Settings\Entities\Setting;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'value' => $this->faker->name,
        ];
    }
}
