<?php

namespace App\src\visit\controllers;

use App\src\visit\models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Visit::all();
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
    public function store(Request $request)
    {
        //dd('estamos en el store');
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        return Visit::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Visit $visit, $id)
    {
        return Visit::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $id)
    {
        $visit = Visit::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $visit->update($data);

        return $visit;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $id)
    {

        if (! $id) {
            return response()->json(['message' => 'No existe'], 404);
        }

        $id->delete();
        
        return response()->json(['message' => 'Eliminado']);
    }
}
