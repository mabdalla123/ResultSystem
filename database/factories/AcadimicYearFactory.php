<?php

namespace Database\Factories;

use App\Models\Department;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcadimicYear>
 */
class AcadimicYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=> $this->faker->bothify("####/####"),
            "department_id"=>Department::factory()
        ];
    }
}
