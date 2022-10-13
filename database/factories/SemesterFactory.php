<?php

namespace Database\Factories;

use App\Models\AcadimicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->regexify('^[a-zA-Z]{0,12}$'),
            'acadimic_year_id' => AcadimicYear::factory(),
            'is_available_for_students' => false,
        ];
    }
}
