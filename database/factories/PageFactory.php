<?php

namespace Database\Factories;

use App\Models\SousMenu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->title,
            'message' => fake()->text,
            'sousmenu_id' => SousMenu::factory()->create()
        ];
    }
}
