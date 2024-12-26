<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'cnic' => $this->faker->unique()->numerify('#####-#######-#'),
            'mobile' => $this->faker->unique()->phoneNumber,
            'age' => $this->faker->numberBetween(25, 65),
            'salary' => $this->faker->randomFloat(2, 30000, 200000),
            'subject' => $this->faker->randomElement(['Math', 'Science', 'History', 'English', 'Computer Science']),
            'address' => $this->faker->address,

        ];
    }
}
