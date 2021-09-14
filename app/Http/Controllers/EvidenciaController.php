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
                Storage::disk('public')->put('evidencias/'.$nombre, File::get($file_evidencia) );

                // Actualizando incidente
                $incidente->estado = 'resuelto';
                $incidente->save();

                // Redirigir a la pagina de incidentes
                return redirect()->route('evidencia.index',['id'=>$id])->with(['error'=>false, 'mensagge'=>'Se registro correctamente la incidencia']);


                }
                catch(Exception $e){
                        return redirect()->route('evidencia.index',['id'=>$id])->with(['error'=>true, 'mensagge'=>'Ocurrio un error al cargar los datos']);
                }

        }
        return redirect()->route('evidencia.index',['id'=>$id])->with(['error'=>true, 'mensagge'=>'Faltan parametros ... ']);
       

    }

    public function eliminarEvidencia($id){

        $evidencia = Evidencia::find($id);
        if($evidencia){
            
            $justificacion =$evidencia->justificaciones;
            $incidencia = $justificacion->incidentes;
            $idIncidente = $incidencia->id;
            
            if( count($justificacion->evidencias)==0){
                $evidencia->delete();
                $justificacion->delete();
                $incidencia->estado='pendiente';
                $incidencia->save();
                return redirect()->route('evidencia.index',['id'=>$idIncidente])->with(['error'=>false, 'mensagge'=>'Se elimino correctamente la justificacion']);
            }
            $evidencia->delete();
            return redirect()->route('evidencia.index',['id'=>$idIncidente])->with(['error'=>false, 'mensagge'=>'Se elimino correctamente la evidencia']);
        }
        return 'Eliminando... Proximamente';
        return view('evidencia.index');
    }

    public function show($nombre_archivo){
        return view('evidencia.show')->with('nombre_archivo', $nombre_archivo);
    }
/*


    public function verEvidencia($nombre_archivo){
        $file = Storage::disk('evidencias')->get($nombre_archivo);
        return new Response($file,200);

        //return response('Hello word',200)->header('Content-Type', 'text/plain');-

        //return response()->download($file)->header('Content-Type', 'text/plain');
        //return view('evidencia.show')->with('img',new Response($file,200));	
    }

*/




}
