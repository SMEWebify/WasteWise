<?php

namespace Database\Factories;

use App\Models\Alert;
use App\Models\Waste;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alert>
 */
class AlertFactory extends Factory
{
    protected $model = Alert::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'alert_type' => $this->faker->randomElement(['Stock Overload', 'Missed Collection', 'Improper Waste Disposal']),
            'waste_id' => Waste::factory(),  // Crée une entrée Waste associée
            'message' => $this->faker->sentence(10),  // Message généré aléatoirement
        ];
    }
}
