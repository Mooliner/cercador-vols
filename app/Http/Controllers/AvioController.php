<?php

namespace App\Http\Controllers;

use App\Models\Avio;
use Illuminate\Http\Request;

class AvioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avions = Avio::all();

        return response()->json($avions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadesValidades = $request->validate([
            'capacitat' => 'required|integer|min:1',
            'companyia_id' => 'required|integer|exists:companyias,id',
        ]);

        $avio = Avio::create($dadesValidades);

        return response()->json($avio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $avio = Avio::findOrFail($id);

        return response()->json($avio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $avio = Avio::findOrFail($id);

        $dadesValidades = $request->validate([
            'capacitat' => 'sometimes|required|integer|min:1',
            'companyia_id' => 'sometimes|required|integer|exists:companyias,id',
        ]);

        $avio->update($dadesValidades);

        return response()->json($avio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Avio::destroy($id);
    }
}
