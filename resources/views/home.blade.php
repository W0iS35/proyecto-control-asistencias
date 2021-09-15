@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PUBLICACIONES</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- ADICIONAL .......... PUBLICACIONES -->
                    <div>
                        <form action="">
                            <div class="form-group row">
                                <label for="publicacion" class="col-md-4 text-right p-1 pr-md-3">Publicaciones</label>
                                <textarea  name="publicacion" class="col-md-7 p-2 border-secondary" id="publicacion" placeholder="Has una publicacion {{Auth::user()->name}}" > </textarea>
                            </div>

                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary btn-sm offset-md-4 col-md-3"> <i class="fa fa-envelope" aria-hidden="true"></i>  Publicar</button>
                            </div>
                        </form>


                    </div>
                    


                        


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
