@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">REGISTRAR INCIDENTE</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('asistencias.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required  autofocus cols="30" rows="5" >{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="apoderado" class="col-md-4 col-form-label text-md-right">Nombre apoderado</label>

                            <div class="col-md-6">
                                <input id="apoderado" type="text" class="form-control @error('apoderado') is-invalid @enderror" name="apoderado" required value="{{ old('apoderado') }}" autofocus>

                                @error('apoderado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="parentesco" class="col-md-4 col-form-label text-md-right">Parentesco</label>

                            <div class="col-md-6">
                                <select id="parentesco" type="text" class="form-control @error('parentesco') is-invalid @enderror" required name="parentesco" autofocus>
                                    @foreach ($parentescos as $parentesco)
                                        <option value="{{$parentesco->id}}">{{$parentesco->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Crear incidente
                                </button>
                                <a href="" class="btn btn-success"> 
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                    Registrar Evidencia </a>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
