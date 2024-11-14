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
        $wastes = Waste::all();
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
            'origin' => 'required|string|max:255',
            'volume' => 'required|numeric',
            'quantity' => 'required|numeric',
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
            'origin' => 'required|string|max:255',
            'volume' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $waste->update($validated);
        return redirect()->route('wastes.index');
    }

    public function destroy($id)
    {
        $waste = Waste::findOrFail($id);
        $waste->delete();
        return redirect()->route('wastes.index');
    }
}
