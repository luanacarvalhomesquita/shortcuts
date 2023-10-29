<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shortcut>
 */
class ShortcutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'note' => fake()->realText(),
            'color' => fake()->hexColor(),
            'link' => 'https://www.google.com/',
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
        ];
    }
}
