<?php

namespace App\Http\Controllers;

use App\Models\Signalement;
use Illuminate\Http\Request;

class SignalementController extends Controller
{
    public function index()
    {
        return response()->json(Signalement::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string|unique:signalements,id',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'tranche' => 'required|string|max:100',
            'zone' => 'required|string|max:255',
            'symptomes' => 'required|array',
            'symptomes_labels' => 'required|array',
            'duree' => 'required|string|max:50',
            'duree_label' => 'required|string|max:100',
            'intensite' => 'required|string|max:50',
            'intensite_label' => 'required|string|max:100',
            'notes' => 'nullable|string',
            'date_signalement' => 'required|string|max:255',
            'statut' => 'required|string|in:nouveau,en_traitement,traite',
            'converted_to_patient_id' => 'nullable|string|max:255',
        ]);

        $signalement = Signalement::create($data);

        return response()->json($signalement, 201);
    }

    public function show(string $id)
    {
        return response()->json(Signalement::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $signalement = Signalement::findOrFail($id);

        $data = $request->validate([
            'prenom' => 'sometimes|required|string|max:255',
            'nom' => 'sometimes|required|string|max:255',
            'tranche' => 'sometimes|required|string|max:100',
            'zone' => 'sometimes|required|string|max:255',
            'symptomes' => 'sometimes|required|array',
            'symptomes_labels' => 'sometimes|required|array',
            'duree' => 'sometimes|required|string|max:50',
            'duree_label' => 'sometimes|required|string|max:100',
            'intensite' => 'sometimes|required|string|max:50',
            'intensite_label' => 'sometimes|required|string|max:100',
            'notes' => 'nullable|string',
            'date_signalement' => 'sometimes|required|string|max:255',
            'statut' => 'sometimes|required|string|in:nouveau,en_traitement,traite',
            'converted_to_patient_id' => 'nullable|string|max:255',
        ]);

        $signalement->update($data);

        return response()->json($signalement);
    }

    public function destroy(string $id)
    {
        Signalement::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
