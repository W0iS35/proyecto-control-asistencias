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
                
                    <div class="row">    
                        <h3 class="text-uppercase col-ms-7 lead font-weight-bold" >Nivel:   </h3>  <span class=" fs-1 col-md-3 text-capitalize"> {{$alumno->nivel}} </span> 
                    </div>   
                    
                    <div class="row">    
                        <h3 class="text-uppercase col-ms-7 lead font-weight-bold" >Grado:   </h3>  <span class=" fs-1 col-md-3"> {{$alumno->grado}} {{$alumno->seccion}} </span> 
                    </div>   
                <!-- Botones ficha -->
                    <div class="form-group row mt-4">
                        <div class="col-md-8 offset-md-4  justify-content-end row">
                            <a class="btn btn-primary btn-sm" href="{{ route('asistencias.create', ['id'=>$alumno->id]) }}"  >
                                <i class="fa fa-plus" aria-hidden="true" ></i> Agregar
                            </a>
                            &nbsp;
                            <a class="btn btn-danger btn-sm" href="{{ route('asistencias.create', ['id'=>$alumno->id]) }}"  >
                                <i class="fa fa-trash" aria-hidden="true" ></i> Eliminar
                            </a>
                            &nbsp;
                    </div>

                </div>
                <hr>
                <!-- Lista de incidentes -->
                @if (count($ficha_incidentes)>0)
                <div class="text-right ">
                    <span > {{count($ficha_incidentes[0]->incidentes)}} Registros</span>
                </div>
                <table class="table table-sm table-striped table-light table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="7" class="bg-dark text-white text-center text-uppercase font-weight-bold"> Listado de Incidentes</td>
                        </tr>
                        <tr style="background: #ccc9" class="text-center font-weight-bold">
                            <td>Nro</td>
                            <td>Auxiliar</td>
                            <td>Fecha</td>
                            <td>Descripcion</td>
                            <td>Apoderado</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php $key=1; ?>
                        @foreach ($ficha_incidentes[0]->incidentes->sortByDesc('id') as $incidente)
                            
                        <tr class=" {{($incidente->estado=='Pendiente')? 'bg-warning':'bg-light'}}">
                            <td  class="text-center" >{{$key}}</td>
                            <td>{{$incidente->usuario->name}} {{$incidente->usuario->surname}}</td>
                            <td  class="text-center" > {{$incidente->created_at }}</td>
                            <td> {{$incidente->descripcion}} </td>
                            <td> {{$incidente->nombre_apoderado}} <span class=" text-lowercase" style="color: #444"> ({{$incidente->parentesco->nombre}})</span> </td>
                            <td  class="text-center" >{{$incidente->estado}}</td>
                            <td class="text-center" > 
                                <a href="{{ route('evidencia.index', ['id'=>$incidente->id]) }}" class=" btn btn-success p-0 pr-1 pl-1">
                                    <abbr title="Agregar evidencia"><i class="fas fa-plus "> </i></abbr>
                                </a>  
                                &nbsp;
                                <a href="" class="btn btn-danger  p-0 pr-1 pl-1 ">
                                    <abbr title="Eliminar incidente"><i class="fas fa-trash-alt "> </i></abbr>
                                </a>   
                            </td>
                        </tr>
                        <?php $key++; ?>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>

        </div>
    </div>
</div>

@endsection
