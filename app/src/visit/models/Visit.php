<?php

namespace App\src\visit\models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'name',
        'email',
        'latitude',
        'longitude',
    ];
}
