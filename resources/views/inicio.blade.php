@extends('template')

@section('seccion')
<h1> TRABAJO UNIDAD II: GRAFOS </h1>
<div>
    <p>Bienvenido al trabajo n°2 de Grafos y lenguajes formales, en esta página web se trabajará con un automata el cuál usted como usuario creará, una vez creado
    podrá obtener la (...) editar.</br>
    </br>
    Para acceder a esas funciones de nuestro sitio web, podrá hacerlo con los botones en la parte superior del sitio o mediante el menú:
    </br></br>
    Para crear y trabajar con el automata AFD: <a href="{{route('Afd')}}" class="btn btn-secondary">Automata AFD</a>
    </br></br>
    Para crear y trabajar con el: <a href="{}" class="btn btn-secondary">Automata AFND(off)</a>
    </br></br>
    Para ver los integrantes del trabajo: <a href="{{route('integrantes')}}" class="btn btn-secondary">Integrantes</a>
    </p>
</div>  
@endsection