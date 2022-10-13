<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AcadimicYear;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Semester>
 */
class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->regexify("[a-z]"),
            "acadimic_year_id"=>AcadimicYear::factory(),
            "is_available_for_students"=>false
        ];
    }
}
