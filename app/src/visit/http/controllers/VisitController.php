<?php

namespace App\src\visit\http\controllers;

use App\src\visit\models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\src\visit\services\VisitServices;
use App\src\visit\http\request\VisitRequest;

class VisitController extends Controller
{
    public function __construct(private VisitServices $visitService){}
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
    public function store(VisitRequest $request)
    {
        return $this->visitService->storeVisit($request);
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
    public function update(Request $request, Visit $visit)
    {

        $visit->update($request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:100',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]));

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
