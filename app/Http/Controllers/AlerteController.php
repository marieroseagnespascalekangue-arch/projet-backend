<?php

namespace App\Http\Controllers;

use App\Models\Alerte;
use Illuminate\Http\Request;

class AlerteController extends Controller
{
    public function index()
    {
        return response()->json(Alerte::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string|unique:alertes,id',
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'niveau' => 'required|string|max:100',
            'statut' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'quartier' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'cas' => 'nullable|integer',
            'date_creation' => 'nullable|string|max:255',
            'date_modif' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'actions' => 'nullable|array',
            'escalade' => 'nullable|boolean',
            'notifications' => 'nullable|integer',
        ]);

        $alerte = Alerte::create($data);

        return response()->json($alerte, 201);
    }

    public function show(string $id)
    {
        return response()->json(Alerte::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $alerte = Alerte::findOrFail($id);

        $data = $request->validate([
            'titre' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'niveau' => 'sometimes|required|string|max:100',
            'statut' => 'sometimes|required|string|max:100',
            'type' => 'sometimes|required|string|max:100',
            'quartier' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'cas' => 'nullable|integer',
            'date_creation' => 'nullable|string|max:255',
            'date_modif' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'actions' => 'nullable|array',
            'escalade' => 'nullable|boolean',
            'notifications' => 'nullable|integer',
        ]);

        $alerte->update($data);

        return response()->json($alerte);
    }

    public function destroy(string $id)
    {
        Alerte::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
