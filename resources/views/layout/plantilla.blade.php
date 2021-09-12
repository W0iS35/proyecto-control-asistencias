<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>@yield('titulo')</title>

    <style>
        .bg-cabrera{
            background-color: #6f42c1;
        }
    </style>

</head>
<body>

     <!-- Inicio header -->
     <header class="bg-cabrera navbar navbar-expand-lg navbar-dark fixed-top fs-5 p-3">
        <div class="container-fluid">
          <a href="{{ route('asistencias.index') }}" class="navbar-brand fs-4">
              CONTROL DE ASISTENCAS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav justify-content-end w-100">
                    <li class="nav-item " ><a class=" nav-link " href="{{Route('asistencias.index')}}"  > <i class="fa fa-search" aria-hidden="true"></i> Buscar incidente</a></li>
                    

<!--   
<li class="nav-item dropdown " ><a class=" nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa fa-pencil-square" aria-hidden="true"></i> Calificaciones</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            <li><a class="dropdown-item bg-light" href="">Subir calificaciones</a></li>
                            <li><a class="dropdown-item bg-light" href="">Ver resultados</a></li>
                          </ul> 
                    </li>


-->

                    
                </ul>
            </div>


        </div>
      </header>
  
      <div class="container-fluid mt-5 pt-5">
          <br>
          <br>
          @yield('contenido')
          <br>
          <br>
      </div>
  
      <footer class="bg-cabrera text-white p-0 pt-5 pb-5 text-center mt-5  justify-content-center">
          <p class="small">Copyright 2021© IEP. Segundo Cabrera Muñoz. Todos los Derechos Reservados. &copy;</p>
      </footer>
  
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/af442f69e2.js" crossorigin="anonymous"></script>
  


   </body>
</html>