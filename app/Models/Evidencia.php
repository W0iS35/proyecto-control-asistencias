<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Justificacion;

class Evidencia extends Model
{
    use HasFactory;
    protected $table = 'evidencias';

    public function justificaciones(){
        return $this->HasMany('App\Models\Justificacion');
    } 

}
