<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        return response()->json(District::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string|unique:districts,id',
            'nom' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'id_code' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'nullable|string|max:100',
            'cas24h' => 'nullable|integer',
            'taux' => 'nullable|numeric',
            'risque' => 'nullable|string|max:100',
            'tendance' => 'nullable|string|max:100',
            'cas_actifs' => 'nullable|integer',
            'taux_transmission' => 'nullable|numeric',
            'chart_data' => 'nullable|array',
            'last_update' => 'nullable|string|max:255',
        ]);

        $district = District::create($data);

        return response()->json($district, 201);
    }

    public function show(string $id)
    {
        return response()->json(District::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $district = District::findOrFail($id);

        $data = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'region' => 'sometimes|required|string|max:255',
            'id_code' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'nullable|string|max:100',
            'cas24h' => 'nullable|integer',
            'taux' => 'nullable|numeric',
            'risque' => 'nullable|string|max:100',
            'tendance' => 'nullable|string|max:100',
            'cas_actifs' => 'nullable|integer',
            'taux_transmission' => 'nullable|numeric',
            'chart_data' => 'nullable|array',
            'last_update' => 'nullable|string|max:255',
        ]);

        $district->update($data);

        return response()->json($district);
    }

    public function destroy(string $id)
    {
        District::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
