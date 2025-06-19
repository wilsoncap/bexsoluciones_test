<?php

namespace App\src\visit\repositories;

use App\src\visit\models\Visit;

class VisitRepositories {

    public function getVisitsAll(){
        return Visit::all();
    }

    public function getVisitId($id){
        return Visit::find($id);
    }

    public function storeVisit($request){
        return Visit::create($request->validated());
    }

    public function updateVisit($data, $visit){
        return $visit->update($data);
    }

    public function deleteVisit($visit){
        return $visit->delete();
    }
}