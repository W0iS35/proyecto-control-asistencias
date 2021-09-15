<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Pariente;
use App\Models\Incidente;
use Illuminate\Support\Facades\Auth;
use App\Models\Fichaincidente;
use Illuminate\Support\Facades\Storage;

class IncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request  )
    {
        if($request->has('pal_buscar')){

            $alu_buscar = $request['pal_buscar'];
            $alumnos = Alumno::  where('DNI','like',"%$alu_buscar%")
                                ->orWhere('apellidos','LIKE',"%$alu_buscar%")
                                ->orWhere('nombres','LIKE',"%$alu_buscar%")
                                ->orWhere('id','LIKE',"%$alu_buscar%")->get();

            return view('incidente.index')->with(['state'=>true, 'alumnos'=>$alumnos]) ; 
        }
        return view('incidente.index')->with('state',false) ; 
    }


    public function incidencias($id)
    {
        $alumno = Alumno::find($id);
        return view('incidente.incidentes') ->with('alumno', $alumno)
                                            ->with('ficha_incidentes', $alumno->ficha_incidentes);
    }

    
    public function create($id)
    {   
        $parentesco = Pariente::all();
        return view('incidente.create')->with('parentescos',$parentesco)
                                        ->with('idAlumno', $id);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'descripcion'=> ['required', 'string', 'max:255'],
            'apoderado'=> ['required', 'string', 'max:255'],
            'parentesco'=> ['required'],
            'idAlumno'=>['required']
        ]);

        $descripcion = $request->input('descripcion');
        $nomApoderado = $request->input('apoderado');
        $parentesco = (int) $request->input('parentesco');
        $idAlumno= (int) $request->input('idAlumno');
        $alumno = Alumno::find($idAlumno); 
        
        if($alumno){
            // Verificando si existe ficha
            $ficha = Fichaincidente::where('alumno_id', $alumno->id)->first();

            if($ficha == null){
                // Creando ficha de incidentes...
                $ficha = new Fichaincidente();
                $ficha->alumno_id=$idAlumno;
                $ficha->save();
            }
            
            // Creando incidencia
            $incidente = new Incidente();
            $incidente->ficha_id=$ficha->id;
            $incidente->auxiliar_id = Auth::user()->id;
            $incidente->descripcion = $descripcion;
            $incidente->nombre_apoderado = $nomApoderado;
            $incidente->pariente_id = $parentesco;
            $incidente->estado = 'Pendiente';
            $incidente->save();

            return redirect()->route('asistencias.incidencias',['id'=>$alumno->id]);
        }
        return "creando incidente...";
    }

    public function eliminarIncidente($id){

        
        $incidente = Incidente::find($id);

        if($incidente){

            $ficha= Fichaincidente::find($incidente->ficha_id);
            
            // Obteniendo tablas predecesoras
            $justificaciones =  $incidente->justificaciones;
            if(count($justificaciones)>0){
                $evidencias = $justificaciones[0]->evidencias;
                // Eliminando evidencias .... 
                if(count($evidencias)){
                    foreach($evidencias as $evidencia){

                        // Eliminando archivo
                         Storage::disk('public')->delete('evidencias/'.$evidencia->nombreArchivo);
                        
                        $evidencia->delete();
                    }
                }

                // Eliminando justificaciones
                $justificaciones[0]->delete();
            }
            // Eliminando incidente
            $incidente->delete();

            return redirect()->route('asistencias.incidencias',['id'=>$ficha->alumno_id]);
        }
        return redirect()->route('asistencias.index');
    }

}
