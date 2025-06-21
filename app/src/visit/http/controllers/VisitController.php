<?php

namespace App\src\visit\http\controllers;

use App\src\visit\models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\src\visit\http\request\VisistRequestUpdate;
use App\src\visit\services\VisitServices;
use App\src\visit\http\request\VisitRequest;
use Illuminate\Http\JsonResponse;

class VisitController extends Controller
{
    public function __construct(private VisitServices $visitService){}
    /**
     * List all Visits
     * 
     * Endpoint para ver totas las visitas registradas en el sistema
     * @return JsonResponse
     */
    public function index():JsonResponse
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
     * Creacion de una visita
     * 
     * Ednpoint para crear una visita
     * 
     * @param Visit $name
     * @param Visit $email
     * @param Visit $latitude
     * @param Visit $longitude
     * 
     * @return JsonResponse
     */
    public function store(VisitRequest $request)
    {
        return $this->visitService->storeVisit($request);
    }

    /**
     * Descripcion de la visita
     * 
     * Endpoint para ver mas en detalle una visita
     * 
     * @param Visit $id
     * @return JsonResponse
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
     * Actualizacion de una visita
     * 
     * Ednpoint para actualizar una visita
     * 
     * @param Visit $name
     * @param Visit $email
     * @param Visit $latitude
     * @param Visit $longitude
     * 
     * @return JsonResponse
     */
    public function update(VisistRequestUpdate $request, int $id)
    {
        return $this->visitService->updateVisit($request, $id);
    }

    /**
     * Eliminar una visita
     * 
     * Endpoint para eliminar una visita
     * 
     * @param Visit $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        return $this->visitService->deleteVisit($id);
    }
}
