<?php

namespace App\src\visit\services;
use App\src\visit\http\request\VisitRequest;
use App\src\visit\repositories\VisitRepositories;
use App\src\utils\ApiResponse;
use App\src\visit\http\request\VisistRequestUpdate;
use App\src\visit\models\Visit;

class VisitServices{

    public function __construct(private VisitRepositories $visitRepository){}


    public function getVisitsAll(){
        try {
            $data = $this->visitRepository->getVisitsAll();
            return ApiResponse::success($data, 'Registros del sistema', 200); 
            
        } catch (\Throwable $th) {
            return ApiResponse::error([], ['exception' => $th->getMessage()], 500);
        }
    }


    public function getVisitId($id){
        try {
            $register =  $this->visitRepository->getVisitId($id);
            return ApiResponse::success($register, 'Registro del sistema', 200);
        } catch (\Throwable $th) {
            return ApiResponse::error([], ['exception' => $th->getMessage()], 500);
        }
       
    }


    public function storeVisit(VisitRequest $request){
        try {
            $store = $this->visitRepository->storeVisit($request);
    
            if ($store) {
                return ApiResponse::success($store, 'Visita registrada', 201);
            }
            
        } catch (\Throwable $th) {
            return ApiResponse::error([], ['exception' => $th->getMessage()], 500);
        }
    }

    public function updateVisit(VisistRequestUpdate $request, $id){
        try {
            $visit = $this->visitRepository->getVisitId($id);
            if (! $visit) return ApiResponse::error([], 'No existe el recurso', 404);

            $update =  $this->visitRepository->updateVisit($request->validated(), $visit);
            if ($update) {
                return ApiResponse::success($visit, 'Visita actualizada', 200);
            }

            return ApiResponse::updateFailed();

        } catch (\Throwable $th) {
            return ApiResponse::error([], ['exception' => $th->getMessage()], 500);
        }
    }

    public function deleteVisit($id){
        $visit = $this->visitRepository->getVisitId($id);
        if (! $visit) {
            return ApiResponse::error([], 'No existe el recurso', 404);
        }

        $this->visitRepository->deleteVisit($visit);
        return ApiResponse::success($visit, 'Eliminado exitosamente', 200);
    }

}