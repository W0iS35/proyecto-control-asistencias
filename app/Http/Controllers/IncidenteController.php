<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Symfony\Component\Console\Input\Input;
use App\Models\Pariente;

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
        //($pal_buscar==null)

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incidencias($id)
    {
        $alumno = Alumno::find($id);
        return view('incidente.incidentes')->with('alumno', $alumno);
    }

    
    public function create($id)
    {   
        $parentesco = Pariente::all();


        return view('incidente.create')->with('parentescos',$parentesco);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        var_dump($request);
        die();
        return "creando incidente...";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
