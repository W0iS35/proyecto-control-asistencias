@extends('layouts.app')



@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">BUSCAR ALUMNOS</div>
            <div class="card-body">
                <form action="{{ route('asistencias.index') }}"  method="GET">
                    <div class="form-group row mt-4">
                        <label for="pal_buscar"  class="col-md-4 col-form-label text-md-right"  >Datos del alumno: </label>
                        <div class="col-md-6">
                            <input class="form-control @error('pal_buscar') is-invalid @enderror" type="text" id="pal_buscar" name="pal_buscar" placeholder="Introduzca datos del alumno a buscar" required>
                            @error('pal_buscar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="offset-md-4">
                            <input class="btn bg-primary text-white " type="submit" value="Buscar">
                        </div>
                    </div>
                </form>
            
                <!-- Mostrando resultados de busqueda -->
                @if ($state)
                    <hr>
                    <h3>Resultados de busqueda</h3>
                    <? $contador=1 ?>
                    <table class="table bg-light table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador=1;  ?>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <td>{{$contador}}</td>
                                    <td>{{$alumno->nombres}}</td>
                                    <td>{{$alumno->apellidos}}</td>
                                    <td>({{$alumno->DNI}})</td>
                                    <td>
                                        <a href="{{ route('asistencias.create', ['id'=>$alumno->id]) }}">
                                            <i class="fas fa-user-edit    "></i> ir a ficha
                                        </a>
                                    </td>
                                </tr>
                            
                                <?php $contador++;?>
                            @endforeach
                        </tbody>


                    </table>
                @endif


            </div>


        </div>
    </div>
</div>

@endsection