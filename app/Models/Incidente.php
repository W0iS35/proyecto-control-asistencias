<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Justificacion;
use App\Models\User;
use App\Models\Fichaincidente;

class Incidente extends Model
{
    use HasFactory;
    protected $table = 'incidentes';

    protected $dateFormat = "Y-d-m H:i:s";

    public function getCreatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }
 
     public function getUpdatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }

    public function justificaciones(){
        return $this->hasMany('App\Models\Justificacion');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\User','auxiliar_id');
    }
    
    public function parentesco(){
        return $this->belongsTo('App\Models\Pariente', 'pariente_id');
    }

    
    public function ficha_incidentes(){
        return $this->belongsTo('App\Models\Fichaincidente','ficha_id');
    }

    

}
