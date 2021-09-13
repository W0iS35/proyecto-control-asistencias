<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;
use App\Models\Incidente;
use Illuminate\Support\Carbon;

class Fichaincidente extends Model
{
    use HasFactory;
    
    protected $table = 'ficha_incidentes';
    
   protected $dateFormat = "Y-d-m H:i:s";

   public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format("Y-d-m H:i:s");
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format("Y-d-m H:i:s");
    }
    public function alumnos(){
        return $this->belongsTo('App\Models\Alumno', 'alumno_id');
    }

    public function incidentes(){
        return $this->hasMany('App\Models\Incidente','ficha_id', 'id');
    }

}
