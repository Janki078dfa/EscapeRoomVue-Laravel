<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->colorName(),
            'date' => $this->faker->date(),
            'available' => $this->faker->boolean(true),
            'game_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
