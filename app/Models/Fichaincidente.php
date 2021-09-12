<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;
use App\Models\Incidente;

class Fichaincidente extends Model
{
    use HasFactory;
    
    protected $table = 'ficha_incidentes';


    public function alumnos(){
        return $this->belongsTo('App\Models\Alumno', 'alumno_id');
    }

    public function incidentes(){
        return $this->hasMany('App\Models\Incidente');
    }

}
