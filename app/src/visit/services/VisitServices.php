<?php

namespace App\src\visit\services;
use App\src\visit\http\request\VisitRequest;
use App\src\visit\repositories\VisitRepositories;
use App\src\utils\ApiResponse;

class VisitServices{

    public function __construct(private VisitRepositories $visitRepository){}


    public function getVisitsAll(){

    }


    public function getVisitId(){
        
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

    public function updateVisit(){

    }

    public function deleteVisit(){

    }

}