@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">EVIDENCIAS REGISTRADAS</div>

                <div class="card-body ">

                    <!-- Informacion de la evidencia -->
                    <div class="  p-3 fs-6 ">
                        <div class="row mb-2"> 
                            <span class=" col-md-5 text-uppercase   text-md-right">Registro incidente:</span>   <span class="col-md-5 font-weight-light text-capitalize">  {{$incidencia->usuario->name}} {{$incidencia->usuario->surname}}</span>
                        </div>
                        <div class="row mb-2">
                                <span class=" col-md-5    text-md-right  text-uppercase"> Descripcion: </span>  <span class="col-md-5 font-weight-light text-capitalize">  {{$incidencia->descripcion}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class=" col-md-5    text-md-right  text-uppercase"> Apoderado: </span> <span class="col-md-5 font-weight-light text-capitalize">  {{$incidencia->nombre_apoderado}}</span>
                        </div>
                        <div class="row mb-2">
                            <span class=" col-md-5    text-md-right  text-uppercase"> Parentesco: </span>    <span class="col-md-5 font-weight-light text-capitalize"> <span class="text-lowercase"> {{$incidencia->parentesco->nombre}}</span></span>
                        </div>
                        <div class="row mb-2">
                                <span class=" col-md-5    text-md-right  text-uppercase"> Evidencias registradas: </span>  
                                    <span class="col-md-5 font-weight-light text-capitalize">   {{ (count($incidencia->justificaciones)==0)? '0' : count($incidencia->justificaciones[0]->evidencias)  }}</span>
                        </div>
                        <div class="align-content-end text-right mt-3">
                            

                        <!-- Large modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                                Agregar evidencia
                        </button>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-3">
                                    <h3 class="text-center p-3" >Agregar evidencia</h3>

                                    @error('file_evidencia')
                                     <strong>* {{$message}}</strong>   
                                    @enderror
                                    <form action="{{ route('evidencia.agregar', ['id'=>$incidencia->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">                                           
                                            <label for="file" class="col-md-4 text-right">Archivo</label>
                                            <input type="file" name="file_evidencia" class="col-md-7" id="file">
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success"  >
                                                <i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir archivo</button>
                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" >
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                Cancelar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <hr>

                       @if (count($incidencia->justificaciones)==0)
                           <h3>
                               Aun no tienes evidencias registradas
                           </h3>
                       @else
                           <table class="table table-sm table-light table-striped">
                            <thead>
                                <tr>
                                    <td class="text-center table-dark font-weight-bold text-uppercase">Nro</td>
                                    <td class="text-center table-dark font-weight-bold text-uppercase">Registro evidencia</td>
                                    <td class="text-center table-dark font-weight-bold text-uppercase">Fecha</td>
                                    <td class="text-center table-dark font-weight-bold text-uppercase">Acciones</td>
                                </tr>
                            </thead>
                            <tbody class=" table-hover">
                                <?php $i=0; ?>
                                @foreach ($incidencia->justificaciones[0]->evidencias as $evidencia)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$evidencia->justificaciones->usuario->name}} {{$evidencia->justificaciones->usuario->surname}} ({{$evidencia->justificaciones->usuario->role}})</td>
                                    <td>{{$evidencia->created_at}}</td>
                                    <td> 
                                        <a href="{{ asset('storage/evidencias/'.$evidencia->nombreArchivo) }}" target="_blank" class="text-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            Ver
                                        </a>
                                        &nbsp;
                                        <a href="{{ asset('storage/evidencias/'.$evidencia->nombreArchivo) }}" download class="text-secondary">
                                            <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                            Descargar
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('evidencia.eliminar', ['id'=>$evidencia->id]) }}" class="text-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            Eliminar
                                        </a>
                                    </td>

                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                           </table>
                           
                       @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
