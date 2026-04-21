<?php

namespace App\Http\Controllers;

use App\Models\Aeroport;
use Illuminate\Http\Request;

class AeroportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aeroports = Aeroport::all();

        return response()->json($aeroports);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadesValidades = $request->validate([
            'codiIATA' => 'required|string|max:3|unique:aeroports',
            'nom' => 'required|string|max:255',
            'ciutat' => 'required|string',
            'pais' => 'required|string',
        ]);

        $aeroport = Aeroport::create($dadesValidades);

        return response()->json($aeroport, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aeroport = Aeroport::findOrFail($id);

        return response()->json($aeroport);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aeroport = Aeroport::findOrFail($id);

        $dadesValidades = $request->validate([
            'codiIATA' => 'sometimes|required|string|max:3|unique:aeroports,codi_iata,'.$id,
            'nom' => 'sometimes|required|string|max:255',
            'ciutat' => 'sometimes|required|string',
            'pais' => 'sometimes|required|string',
        ]);

        $aeroport->update($dadesValidades);

        return response()->json($aeroport);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Aeroport::destroy($id);
    }
}
