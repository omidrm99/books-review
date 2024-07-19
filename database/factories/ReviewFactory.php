<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => null,
            'review' => $this->faker->paragraph(),
            'rating' => $this->faker->numberBetween(1, 5),
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            }
        ];
    }

    public function good()
    {
        return $this->state(function (array $attributes) {
           return [
               'rating' => rand(4, 5),
           ];
        });
    }
    public function average()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => rand(2, 5),
            ];
        });
    }
    public function bad()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => rand(1, 3),
            ];
        });
    }
}
