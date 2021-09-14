<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';

    public function ficha_incidentes(){
        return $this->hasMany('App\Models\Fichaincidente');
    }

    
    protected $dateFormat = "Y-d-m H:i:s";

    public function getCreatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }
 
     public function getUpdatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }

}