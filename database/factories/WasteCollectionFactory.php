<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Waste;
use App\Models\Provider;
use App\Models\WasteCollection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WasteCollection>
 */
class WasteCollectionFactory extends Factory
{
    
    protected $model = WasteCollection::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        // Liste des statuts possibles
        $statuses = ['à programmer', 'programmée', 'en cours', 'terminée', 'annulée'];

        
        return [
            'waste_id' => Waste::factory(), // Crée un waste associé si aucun n'est disponible
            'provider_id' => Provider::factory(), // Crée un provider associé si aucun n'est disponible
            'scheduled_date' => Carbon::now()->addDays(rand(1, 30)), // Une date de collecte planifiée dans le futur
            'status' => $this->faker->randomElement($statuses), // Choix aléatoire parmi les statuts
            'collection_date' => $this->faker->boolean() ? Carbon::now()->addDays(rand(1, 40)) : null, // Date de collecte ou null
            'collected_volume' => $this->faker->optional()->randomFloat(2, 1, 100), // Volume collecté (peut être nul)
            'cost' => $this->faker->optional()->randomFloat(2, 50, 500), // Coût total de la collecte (peut être nul)
        ];
    }
}
