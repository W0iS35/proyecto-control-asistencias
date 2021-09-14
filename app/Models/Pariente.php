<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Justificacion;
use Illuminate\Support\Carbon;

class Pariente extends Model
{
    use HasFactory;
    protected $table = 'parientes';


    public function justificaciones(){
        return $this->HasMany('App\Models\Justificacion');
    } 
    
    protected $dateFormat = "Y-d-m H:i:s";

    public function getCreatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }
 
     public function getUpdatedAtAttribute($value){
         return Carbon::parse($value)->format("Y-d-m H:i:s");
     }

}
