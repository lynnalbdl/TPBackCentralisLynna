<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function index() {
        return Contrat::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'id_lot' => 'required|exists:lots,id',
            'id_entité' => 'required|exists:entités,id',
            'binaire' => 'nullable|file|max:5120',
        ]);

        if ($request->hasFile('binaire')) {
            $data['binaire'] = file_get_contents($request->file('binaire')->getRealPath());
        }

        return Contrat::create($data);
    }

    public function show(Contrat $contrat) {
        return $contrat;
    }

    public function update(Request $request, Contrat $contrat) {
        $data = $request->validate([
            'id_lot' => 'sometimes|exists:lots,id',
            'id_entité' => 'sometimes|exists:entités,id',
            'binaire' => 'nullable|file|max:5120',
        ]);

        if ($request->hasFile('binaire')) {
            $data['binaire'] = file_get_contents($request->file('binaire')->getRealPath());
        }

        $contrat->update($data);
        return $contrat;
    }

    public function destroy(Contrat $contrat) {
        $contrat->delete();
        return response()->noContent();
    }
}

