<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\studentGrades>
 */
class studentGradesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'teacher_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'Grade' => $this->faker->numberBetween($min = 75, $max = 100),
        ];
    }
}
