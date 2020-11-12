@extends('template')

@section('seccion')
<h1> TRABAJO UNIDAD II: GRAFOS </h1>
<div>
    <p>Bienvenido al trabajo n°2 de Grafos y lenguajes formales, en esta página web se trabajará con un automata el cuál usted como usuario creará, una vez creado
    podrá obtener la (...) editar.</br>
    </br>
    Para acceder a esas funciones de nuestro sitio web, podrá hacerlo con los botones en la parte superior del sitio o mediante el menú:
    </br></br>
    Para crear y trabajar con los automatas AFD/AFND: <a href="{{route('Afd')}}" class="btn btn-secondary">Automatas AFD/AFND</a>
    </br></br>
    Para ver los integrantes del trabajo: <a href="{{route('integrantes')}}" class="btn btn-secondary">Integrantes</a>
    </p>
</div>  
@endsection