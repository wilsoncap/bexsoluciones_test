<?php

namespace App\src\visit\repositories;

use App\src\visit\models\Visit;

class VisitRepositories {

    public function getVisitsAll(){

    }


    public function getVisitId(){
        
    }


    public function storeVisit($request){
        return Visit::create($request->validated());
    }

    public function updateVisit(){

    }

    public function deleteVisit(){

    }
}