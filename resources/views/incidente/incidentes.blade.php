@extends('layouts.app')



@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">FICHA DE INCIDENCIAS</div>
            <div class="card-body">

                <!-- Inicio datos del alumno -->
                <div class="p-3">
                    <div class="row">
                        <h3 class="text-uppercase col-ms-7 lead font-weight-bold" >Alumno:  </h3>  <span class=" fs-1 col-md-3"> {{$alumno->nombres}} </span> 
                    </div>
                    <div class="row">    
                        <h3 class="text-uppercase col-ms-7 lead font-weight-bold" >Apellidos:   </h3>  <span class=" fs-1 col-md-3"> {{$alumno->apellidos}} </span> 
                    </div>     
                
                <!-- Botones ficha -->
                    <div class="form-group row mt-4">
                        <div class="col-md-8 offset-md-4  justify-content-end row">
                            <a class="btn btn-primary" href="{{ route('asistencias.create', ['id'=>$alumno->id ]) }}" >
                                <i class="fa fa-plus" aria-hidden="true" ></i> Agregar
                            </a>
                            &nbsp;
                    </div>

                </div>
                <hr>
                
                <!-- Lista de incidentes -->
                @if (true)
                <table class="table table-sm table-striped table-light table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="6" class="bg-dark text-white text-center text-uppercase font-weight-bold"> Listado de Incidentes</td>
                        </tr>
                        <tr style="background: #ccc9" class="text-center font-weight-bold">
                            <td>Nro</td>
                            <td>Auxiliar</td>
                            <td>Fecha</td>
                            <td>Descripcion</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody> 

                        <tr>
                            <td  class="text-center" >1</td>
                            <td>Juan Perez</td>
                            <td  class="text-center" >{{date('Y-m-d')}}</td>
                            <td>Consulta medica</td>
                            <td  class="text-center" >Pendiente</td>
                            <td class="text-center" > 
                                <a href="" class="text-primary">
                                    <i class="fas fa-edit "> Editar</i>
                                </a>  
                                &nbsp;
                                <a href="" class="text-danger">
                                    <i class="fas fa-edit "> Eliminar</i>
                                </a>   
                            </td>
                        </tr>
                            
                    </tbody>
                </table>
                @endif

            </div>

        </div>
    </div>
</div>

@endsection
