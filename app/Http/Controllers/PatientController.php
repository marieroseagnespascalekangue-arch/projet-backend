<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return response()->json(Patient::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string|unique:patients,id',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'sexe' => 'required|string|in:M,F',
            'quartier' => 'required|string|max:255',
            'diagnostic' => 'required|string|max:255',
            'statut' => 'required|string|in:critique,stable,ameliore,sorti',
            'date_admission' => 'required|string|max:255',
            'derniere' => 'required|string|max:255',
            'tel' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'date_naissance' => 'nullable|string|max:255',
            'groupe_sanguin' => 'nullable|string|max:50',
            'allergies' => 'nullable|string|max:255',
            'antecedents' => 'nullable|string',
            'traitement' => 'nullable|string',
            'poids' => 'nullable|string|max:100',
            'taille' => 'nullable|string|max:100',
            'tension' => 'nullable|string|max:100',
            'temperature' => 'nullable|string|max:100',
            'observations' => 'nullable|string',
            'medecin' => 'nullable|string|max:255',
            'consultations' => 'nullable|array',
            'note' => 'nullable|numeric|min:0|max:5',
        ]);

        $patient = Patient::create($data);

        return response()->json($patient, 201);
    }

    public function show(string $id)
    {
        return response()->json(Patient::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $patient = Patient::findOrFail($id);

        $data = $request->validate([
            'prenom' => 'sometimes|required|string|max:255',
            'nom' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer|min:0',
            'sexe' => 'sometimes|required|string|in:M,F',
            'quartier' => 'sometimes|required|string|max:255',
            'diagnostic' => 'sometimes|required|string|max:255',
            'statut' => 'sometimes|required|string|in:critique,stable,ameliore,sorti',
            'date_admission' => 'sometimes|required|string|max:255',
            'derniere' => 'sometimes|required|string|max:255',
            'tel' => 'sometimes|required|string|max:100',
            'email' => 'nullable|email|max:255',
            'date_naissance' => 'nullable|string|max:255',
            'groupe_sanguin' => 'nullable|string|max:50',
            'allergies' => 'nullable|string|max:255',
            'antecedents' => 'nullable|string',
            'traitement' => 'nullable|string',
            'poids' => 'nullable|string|max:100',
            'taille' => 'nullable|string|max:100',
            'tension' => 'nullable|string|max:100',
            'temperature' => 'nullable|string|max:100',
            'observations' => 'nullable|string',
            'medecin' => 'nullable|string|max:255',
            'consultations' => 'nullable|array',
            'note' => 'nullable|numeric|min:0|max:5',
        ]);

        $patient->update($data);

        return response()->json($patient);
    }

    public function destroy(string $id)
    {
        Patient::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
