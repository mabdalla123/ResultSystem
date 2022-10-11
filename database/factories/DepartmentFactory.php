<?php

namespace Database\Factories;

use App\Models\AcadimicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->firstName,
            // "acadimicyear_id"=>AcadimicYear::factory()
        ];
    }
}
