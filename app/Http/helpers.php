
<?php

use App\Models\Alumno;

function helloWord(){
    return 'Hello world';
}
function hasIncidente($id){

    //return Alumno::find($id);

    $alumno = Alumno::find($id);
    if($alumno){
        $ficha= $alumno->ficha_incidentes;
        if($ficha){
            if(count($ficha)){
                $incidentes=$ficha[0]->incidentes;
                if($incidentes){
                    if(count($incidentes)){
                        if($incidentes->where('estado','LIKE','Pendiente')->first())
                            return true;
                        return false; 
                    }
                }
            return false;
            }
            return false;
        }
        return false;
    }
    return false;


}


