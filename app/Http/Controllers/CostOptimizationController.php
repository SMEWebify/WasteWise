<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\WasteCollection;

class CostOptimizationController extends Controller
{
    public function index()
    {
        // Calculer les coûts de traitement des déchets
        $costs = $this->calculateCosts();
        return Inertia::render('Costs/Index', ['costs' => $costs]);
    }

    public function compare()
    {
        // Comparer les fournisseurs de traitement
        $comparison = $this->compareProviders();
        return Inertia::render('Costs/Comparison', ['comparison' => $comparison]);
    }

    public function plan()
    {
        // Planifier les collectes de déchets
        $planning = $this->optimizePlanning();
        return Inertia::render('Costs/Planning', ['planning' => $planning]);
    }

    private function calculateCosts()
    {
        // Requête pour obtenir les collectes de déchets avec les fournisseurs et les coûts associés
        $collections = WasteCollection::with('waste', 'provider')->get();

        $costs = $collections->map(function ($collection) {
            // Calcul du coût total par collecte en fonction du volume collecté et du coût par unité du fournisseur
            $totalCost = round($collection->collected_volume * $collection->provider->cost_per_unit,2);

            return [
                'waste_type' => $collection->waste->type,
                'provider' => $collection->provider->name,
                'volume' => $collection->collected_volume,
                'cost_per_unit' => $collection->provider->cost_per_unit,
                'total_cost' => $totalCost,
                'currency' => $collection->provider->currency,
            ];
        });

        return $costs;
    }


    private function compareProviders()
    {
        // Récupérer toutes les collectes avec les fournisseurs et déchets
        $collections = WasteCollection::with('waste', 'provider')->get();
    
        // Comparaison des fournisseurs par type de déchets et fournisseur
        $comparison = $collections->groupBy('waste.type')
            ->map(function ($groupedCollections, $wasteType) {
                // Regrouper les collectes par fournisseur pour chaque type de déchet
                $providersComparison = $groupedCollections->groupBy('provider_id')
                    ->map(function ($providerCollections, $providerId) use ($wasteType) {
                        // Calculer le coût total pour chaque fournisseur pour ce type de déchet
                        $totalCost = round($providerCollections->sum(function ($collection) {
                            return $collection->collected_volume * $collection->provider->cost_per_unit;
                        }),2);
    
                        // Récupérer les informations du fournisseur
                        $provider = $providerCollections->first()->provider; // Prendre le fournisseur d'une des collectes
    
                        return [
                            'provider_name' => $provider->name,
                            'total_cost' => $totalCost,
                            'cost_per_unit' => $provider->cost_per_unit,
                            'currency' => $provider->currency,
                        ];
                    });
                // Retourner la comparaison pour chaque type de déchet avec tous les fournisseurs
                return [
                    'waste_type' => $wasteType,
                    'providers' => $providersComparison,
                ];
            });
    
        return $comparison;
    }
    
    

    private function optimizePlanning()
    {
        // Récupérer les collectes avec les fournisseurs, en filtrant par statut 'planifié' ou un autre statut pertinent
        $collections = WasteCollection::with('provider')
            ->whereIn('status', ['programmée', 'à programmer']) // Statuts à ajuster selon les besoins
            ->whereNull('collection_date')  // Assurez-vous que la date de collecte n'est pas encore définie
            ->get();
        
        // Planification : regrouper les collectes par fournisseur et minimiser les trajets
        $planning = $collections->groupBy('provider_id')->map(function ($providerCollections, $providerId) {
            $provider = $providerCollections->first()->provider;
    
            // Calculer le volume total à collecter pour chaque fournisseur
            $totalVolume = $providerCollections->sum('collected_volume');
            $totalCost = $providerCollections->sum(function ($collection) {
                return $collection->collected_volume * $collection->provider->cost_per_unit;
            });
    
            // Vous pouvez également envisager de calculer la date de collecte estimée ici
            $estimatedCollectionDate = $providerCollections->min('scheduled_date'); // Exemple : prendre la date la plus proche
    
            return [
                'provider' => $provider->name,
                'total_volume' => $totalVolume,
                'total_cost' => $totalCost,
                'currency' => $provider->currency,
                'estimated_collection_date' => $estimatedCollectionDate, // Date estimée
            ];
        });
    
        return $planning;
    }
    
}
