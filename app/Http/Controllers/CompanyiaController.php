<?php

namespace App\Http\Controllers;

use App\Models\Companyia;
use Illuminate\Http\Request;

class CompanyiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyies = Companyia::all();

        return response()->json($companyies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadesValidades = $request->validate([
            'nom' => 'required|string|max:255|unique:companyias',
            'codi' => 'required|integer|min:1',
        ]);

        $companyia = Companyia::create($dadesValidades);

        return response()->json($companyia, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $companyia = Companyia::findOrFail($id);

        return response()->json($companyia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $companyia = Companyia::findOrFail($id);

        $dadesValidades = $request->validate([
            'nom' => 'required|string|max:255|unique:companyias',
            'codi' => 'required|integer|min:1',
        ]);

        $companyia->update($dadesValidades);

        return response()->json($companyia);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Companyia::destriy($id);
    }
}
