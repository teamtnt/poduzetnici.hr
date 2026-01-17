<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['offer', 'demand']),
            'category' => $this->faker->randomElement(['Prodaja poslovanja', 'Partnerstva', 'Oprema i alati']),
            'location' => $this->faker->city(),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'duration_days' => 30,
            'expires_at' => now()->addDays(30),
            'is_anonymous' => false,
            'views_count' => 0,
        ];
    }
}
