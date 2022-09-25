<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPUnit\Framework\returnSelf;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arr = [
            "math",
            "arabic",
            "english",
            "frensh",
            "spanish",
            "italic",
            "data structure",
            "design pattern",
            "architect Design pattern",
            "multimedia",
            "Database",
            "advance"
        ];
        return [
            "name"=>$arr[rand(0,11)],
        ];
    }
}
