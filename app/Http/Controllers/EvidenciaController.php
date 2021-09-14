<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use App\Models\Incidente;
use App\Models\Justificacion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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



    public function agregarEvidencia($id, Request $request){
        
        $request->validate([
            'file_evidencia'=>['required']
        ]);

        $id = (int) $id;
        $incidente = Incidente::find($id);
        $file_evidencia = $request->file('file_evidencia');

        if( $incidente && $file_evidencia){
            

            try{



            // Buscando y creando justificacion
                // Obteniendo o creando justificacion   
                $justificacion = Justificacion::where('incidente_id',$incidente->id)->first();

                if($justificacion==null){
                    $justificacion = new Justificacion();
                    $justificacion->justificador_id = Auth::user()->id;
                    $justificacion->incidente_id = $incidente->id;
                    $justificacion->save();
                }
            
            // Evidencia
                // Creando nombre de la imagen
                $nombre = time().$file_evidencia->getClientOriginalName();
        
                // Crear evidencia
                $evidencia = new Evidencia();
                $evidencia->nombreArchivo = $nombre;
                $evidencia->justificaciones_id = $justificacion->id;
                $evidencia->save();
                            
                // Almacenar la imagen
                Storage::disk('evidencias')->put($nombre, File::get($file_evidencia) );

                // Actualizando incidente
                $incidente->estado = 'resuelto';

                // Redirigir a la pagina de incidentes
                return redirect()->route('evidencia.index',['id'=>$id])->with(['error'=>false, 'mensagge'=>'Se registro correctamente la incidencia']);


                }
                catch(Exception $e){
                        return redirect()->route('evidencia.index',['id'=>$id])->with(['error'=>true, 'mensagge'=>'Ocurrio un error al cargar los datos']);
                }

        }
        return redirect()->route('evidencia.index',['id'=>$id])->with(['error'=>true, 'mensagge'=>'Faltan parametros ... ']);
       

    }

    public function eliminarEvidencia(){
        return view('evidencia.index');
    }

    public function verEvidencia($nombre_archivo){

        return view('evidencia.index');
    }





}
