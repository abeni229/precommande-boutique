<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'prix' => $this->faker->numberBetween(10, 200),
            'quantite' => $this->faker->numberBetween(0, 50),
            'statut' => $this->faker->randomElement(["en stock", "rupture"]),
            'admin_id' => Admin::inRandomOrder()->first()->id ?? 1, // Prend un admin existant ou met 1

        ];
    }
}
