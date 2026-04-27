<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Illuminate\Http\Request;

class VolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vols = Vol::all();

        return response()->json($vols);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadesValidades = $request->validate([
            'data_sortida' => 'required|date|after_or_equal:today',
            'data_arribada' => 'required|date|after:data_sortida',
            'preu' => 'required|numeric|min:0',
            'companyia_id' => 'required|integer|exists:companyias,id',
            'avio_id' => 'required|integer|exists:avions,id',
        ]);

        $vol = Vol::create($dadesValidades);

        return reponse()->json($vol, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vol = Vol::findOrFail($id);

        return response()->json($vol);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vol = Vol::findOrFail($id);

        $dadesValidades = $request->validate([
            'data_sortida' => 'sometimes|required|date|after_or_equal:today',
            'data_arribada' => 'sometimes|required|date|after:data_sortida',
            'preu' => 'sometimes|required|numeric|min:0',
            'companyia_id' => 'sometimes|required|integer|exists:companyias,id',
            'avio_id' => 'sometimes|required|integer|exists:avions,id',
        ]);

        $vol->update($dadesValidades);

        return reponse()->json($vol);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vol::destroy($id);
    }
}
