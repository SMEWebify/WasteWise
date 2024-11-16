<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Waste>
 */
class WasteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Plastique', 'Métal', 'Papier', 'Verre', 'Organique']), // Types de déchets courants
            'category' => $this->faker->randomElement(['Recyclable', 'Non-Recyclable', 'Dangereux', 'Compostable']), // Catégories possibles
            'origin' => $this->faker->randomElement(['Industriel', 'Ménager', 'Agricole', 'Construction']), // Origine des déchets
            'volume' => $this->faker->randomFloat(2, 10, 1000), // Volume compris entre 10 et 1000 unités
            'unit' => $this->faker->randomElement(['kg', 'tonne', 'litre', 'm³']), // Unité de mesure
        ];
    }
}
