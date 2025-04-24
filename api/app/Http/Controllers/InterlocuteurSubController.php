<?php

namespace App\Http\Controllers;

use App\Models\InterlocuteurSub;
use Illuminate\Http\Request;

class InterlocuteurSubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return InterlocuteurSub::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_entité' => 'required|exists:entités,id',
            'téléphone' => 'required|string',
            'e_mail_contact' => 'required|email',
        ]);
        return InterlocuteurSub::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(InterlocuteurSub $interlocuteurSub) {
        return $interlocuteurSub;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InterlocuteurSub $interlocuteurSub) {
        $data = $request->validate([
            'téléphone' => 'sometimes|string',
            'e_mail_contact' => 'sometimes|email',
        ]);
        $interlocuteurSub->update($data);
        return $interlocuteurSub;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InterlocuteurSub $interlocuteurSub) {
        $interlocuteurSub->delete();
        return response()->noContent();
    }
}
