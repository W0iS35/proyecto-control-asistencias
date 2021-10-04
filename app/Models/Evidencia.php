<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Justificacion;

class Evidencia extends Model
{
    use HasFactory;
    protected $table = 'evidencias';


    protected $dateFormat = "Y-d-m H:i:s";

    public function getCreatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
    }
 
     public function getUpdatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }

    public function justificaciones(){
        return $this->belongsTo('App\Models\Justificacion','justificaciones_id');
    } 

}
