<?php

namespace App\Http\Controllers;

use App\Models\Entité;
use Illuminate\Http\Request;

class EntitéController extends Controller
{
    public function index() {
        return Entité::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'id_contrat' => 'nullable|exists:contrats,id',
            'id_adress' => 'required|exists:adresses,id',
            'nom' => 'required|string',
            'type' => 'required|string',
            'logo' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = file_get_contents($request->file('logo')->getRealPath());
        }

        return Entité::create($data);
    }

    public function show(Entité $entité) {
        return $entité;
    }

    public function update(Request $request, Entité $entité) {
        $data = $request->validate([
            'id_contrat' => 'nullable|exists:contrats,id',
            'id_adress' => 'sometimes|exists:adresses,id',
            'nom' => 'sometimes|string',
            'type' => 'sometimes|string',
            'logo' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = file_get_contents($request->file('logo')->getRealPath());
        }

        $entité->update($data);
        return $entité;
    }

    public function destroy(Entité $entité) {
        $entité->delete();
        return response()->noContent();
    }
}

