<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    public function index()
    {
        // Récupérer la liste des déchets et leurs types
        $wastes = Waste::with('collections')
        ->leftjoin('waste_collections', 'wastes.id', '=', 'waste_collections.waste_id')
        ->orderByRaw("FIELD(waste_collections.status, 'à programmer', 'programmée', 'en cours', 'terminée', 'annulée') ASC")
        ->select('wastes.*')
        ->get();

        return Inertia::render('Wastes/Index', ['wastes' => $wastes]);
    }

    public function create()
    {
        return Inertia::render('Wastes/Create');
    }

    public function store(Request $request)
    {
        // Validation et création de nouveaux types de déchets
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'volume' => 'required|numeric',
            'unit' => 'required|string|max:255',
        ]);

        Waste::create($validated);
        return redirect()->route('wastes.index');
    }

    public function edit($id)
    {
        $waste = Waste::findOrFail($id);
        return Inertia::render('Wastes/Edit', ['waste' => $waste]);
    }

    public function update(Request $request, $id)
    {
        $waste = Waste::findOrFail($id);

        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'volume' => 'required|numeric',
            'unit' => 'required|string|max:255',
        ]);

        $waste->update($validated);
        return redirect()->route('wastes.index');
    }

    public function destroy($id)
    {
        $waste = Waste::findOrFail($id);
        $waste->delete();
        $wastes = Waste::with('collections')->get();
        return Inertia::render('Wastes/Index', ['wastes' => $wastes]);
    }
}
