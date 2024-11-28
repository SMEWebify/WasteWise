<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\Provider;
use App\Models\WasteCollection;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WasteCollectionController extends Controller
{
    /**
     * Afficher la liste des collectes de déchets
     */
    public function index()
    {
        // Récupérer toutes les collectes de déchets
        $wasteCollections = WasteCollection::with(['waste', 'provider'])->get();
        
        return Inertia::render('WasteCollections/Index', [
            'wasteCollections' => $wasteCollections,
        ]);
    }

    /**
     * Afficher le formulaire pour créer une nouvelle collecte de déchets
     */
    public function create()
    {
        // Récupérer les déchets et les fournisseurs pour peupler les champs de sélection
        $wastes = Waste::all();
        $providers = Provider::all();

        return Inertia::render('WasteCollections/Create', [
            'wastes' => $wastes,
            'providers' => $providers,
        ]);
    }

    /**
     * Stocker une nouvelle collecte de déchets
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'waste_id' => 'required|exists:wastes,id',
            'provider_id' => 'required|exists:providers,id',
            'scheduled_date' => 'required|date',
            'status' => 'required|string',
            'collection_date' => 'nullable|date',
            'collected_volume' => 'nullable|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
        ]);

        // Création d'une nouvelle collecte de déchets
        WasteCollection::create($validated);

        return redirect()->route('wasteCollections.index')->with('success', 'Collecte créée avec succès.');
    }

    /**
     * Afficher le formulaire pour modifier une collecte de déchets
     */
    public function edit(WasteCollection $wasteCollection)
    {
        // Récupérer les déchets et les fournisseurs pour les champs de sélection
        $wastes = Waste::all();
        $providers = Provider::all();
        return Inertia::render('WasteCollections/Edit', [
            'wasteCollection' => $wasteCollection,
            'wastes' => $wastes,
            'providers' => $providers,
        ]);
    }

    /**
     * Mettre à jour une collecte de déchets
     */
    public function update(Request $request, WasteCollection $wasteCollection)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'waste_id' => 'required|exists:wastes,id',
            'provider_id' => 'required|exists:providers,id',
            'scheduled_date' => 'required|date',
            'status' => 'required|string',
            'collection_date' => 'nullable|date',
            'collected_volume' => 'nullable|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
        ]);

        // Mise à jour de la collecte de déchets
        $wasteCollection->update($validated);

        return redirect()->route('wasteCollections.index')->with('success', 'Collecte mise à jour avec succès.');
    }

    /**
     * Supprimer une collecte de déchets
     */
    public function destroy(WasteCollection $wasteCollection)
    {
        // Suppression de la collecte de déchets
        $wasteCollection->delete();

        return redirect()->route('wasteCollections.index')->with('success', 'Collecte supprimée avec succès.');
    }
}
