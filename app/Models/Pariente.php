<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Justificacion;

class Pariente extends Model
{
    use HasFactory;
    protected $table = 'parientes';


    public function justificaciones(){
        return $this->HasMany('App\Models\Justificacion');
    } 

}
