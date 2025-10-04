<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level_id' => $this->faker->numberBetween(1, 6),
            'user_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'description' => $this->faker->sentence,
        ];
    }
}
