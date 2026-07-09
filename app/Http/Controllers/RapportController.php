<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index()
    {
        return response()->json(Rapport::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string|unique:rapports,id',
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categorie' => 'required|string|max:100',
            'statut' => 'required|string|max:100',
            'date_generation' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'auteur_initials' => 'nullable|string|max:10',
            'taille' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'vues' => 'nullable|integer',
            'note' => 'nullable|numeric|min:0|max:5',
            'district' => 'nullable|string|max:255',
            'periode' => 'nullable|string|max:255',
        ]);

        $rapport = Rapport::create($data);

        return response()->json($rapport, 201);
    }

    public function show(string $id)
    {
        return response()->json(Rapport::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $rapport = Rapport::findOrFail($id);

        $data = $request->validate([
            'titre' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'categorie' => 'sometimes|required|string|max:100',
            'statut' => 'sometimes|required|string|max:100',
            'date_generation' => 'sometimes|required|string|max:255',
            'auteur' => 'sometimes|required|string|max:255',
            'auteur_initials' => 'nullable|string|max:10',
            'taille' => 'nullable|string|max:100',
            'type' => 'nullable|string|max:100',
            'tags' => 'nullable|array',
            'vues' => 'nullable|integer',
            'note' => 'nullable|numeric|min:0|max:5',
            'district' => 'nullable|string|max:255',
            'periode' => 'nullable|string|max:255',
        ]);

        $rapport->update($data);

        return response()->json($rapport);
    }

    public function destroy(string $id)
    {
        Rapport::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
