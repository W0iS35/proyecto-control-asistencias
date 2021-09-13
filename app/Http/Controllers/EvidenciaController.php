<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id){
        $incidencia = Incidente::find($id);
        if($incidencia){
         //   return $incidencia->justificaciones;
            return view('evidencia.index')->with('incidencia', $incidencia);
        }
        return redirect()->route('asistencias.index')->with([ 'error'=>true, 'message'=>'No se encontro el incidente']);
    }


    public function crearEvidencia(){
        return view('evidencia.index');
    }
    

    public function agregarEvidencia($id, Request $request){
        
        $request->validate([
            'file_evidencia'=>['required']
        ]);


        $incidente = Incidente::find($id);
        $file_evidencia = $request->file('file_evidencia');

        if( $incidente && $file_evidencia){
            
            echo 'Nombre: '.$file_evidencia->getClientOriginalName();
            echo 'Ext: '.$file_evidencia->getClientOriginalExtension();
            die();

            // Crear evidencia

            
            // Almacenar la imagem


            // crear justificacion


            // Redirigir a la pagina de incidentes

            // Almacenar la imagem
            
            return $incidente;
        }
        return 'Error';

    }

    public function eliminarEvidencia(){
        return view('evidencia.index');
    }

    public function verEvidencia($nombre_archivo){

        return view('evidencia.index');
    }





}
