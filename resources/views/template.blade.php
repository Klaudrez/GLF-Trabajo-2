<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Trabajo n° 1 Grafos</title>
  </head>
  <body>
    
    <span class="d-block p-2 bg-dark text-white">
      <a href="{{route('inicio')}}" class="btn btn-primary">Inicio</a>
      <a href="{{route('Afd')}}" class="btn btn-primary">Automatas AFD/AFND</a>
      <a href="{{route('integrantes')}}" class="btn btn-primary">Integrantes</a>
      
      
    </span>
    <div class="container-fluid">
      @yield('seccion')
    </div>
    <footer>
    <!-- <div class="fixed-bottom"><span class="d-block p-2 bg-dark text-white"><p class="text-center">Utem©</p></span></div> -->
    </footer>
    <!-- <div class="fixed-bottom"><span class="d-block p-2 bg-dark text-white"><p class="text-center">Utem©</p></span></div> -->
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>