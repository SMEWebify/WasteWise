<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    
    protected $model = Provider::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'service_type' => $this->faker->randomElement(['Recyclage', 'Incineration', 'Transport']),
            'cost_per_unit' => $this->faker->randomFloat(2, 50, 500),  // Coût par unité (ex: €/kg)
            'currency' => $this->faker->currencyCode,  // Génère un code de devise
        ];
    }
}
