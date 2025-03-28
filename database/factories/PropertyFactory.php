<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = $this->faker->numberBetween(2, 10);
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->sentences(4, true),
            'surface' => $this->faker->numberBetween(20, 350),
            'rooms' => $rooms,
            'bedrooms' => $this->faker->numberBetween(1, $rooms),
            'floor' => $this->faker->numberBetween(0, 15),
            'price' => $this->faker->numberBetween(250000, 2500000),
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'sold' => false,
        ];
    }

    /**
     * Indicate that the model's sold should be true.
     */
    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
