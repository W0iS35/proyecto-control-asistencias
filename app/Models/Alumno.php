<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';

    public function ficha_incidentes(){
        return $this->hasMany('App\Models\Fichaincidente');
    }

}