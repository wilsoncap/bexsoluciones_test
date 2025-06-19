<?php

namespace App\src\visit\http\controllers;

use App\src\visit\models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\src\visit\http\request\VisistRequestUpdate;
use App\src\visit\services\VisitServices;
use App\src\visit\http\request\VisitRequest;
use App\src\visit\http\request\VisitRequestUpdate;

class VisitController extends Controller
{
    public function __construct(private VisitServices $visitService){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->visitService->getVisitsAll();
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
    public function show($id)
    {
        return $this->visitService->getVisitId($id);
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
    public function update(VisistRequestUpdate $request, $id)
    {
        return $this->visitService->updateVisit($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->visitService->deleteVisit($id);
    }
}
