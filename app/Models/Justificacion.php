<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Evidencia;
use App\Models\Pariente;
use App\Models\Incidente;
class Justificacion extends Model
{
    use HasFactory;
    protected $table = 'justificaciones';


    protected $dateFormat = "Y-d-m H:i:s";

    public function getCreatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }
 
     public function getUpdatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }

    public function usuario(){
        return $this->belongsTo('App\Models\User','justificador_id');
    }
    
    public function incidentes(){
        return $this->belongsTo('App\Models\Incidente', 'incidente_id');
    }
    
    public function evidencias(){
        return $this->hasMany('App\Models\Evidencia');
    }
    


}
