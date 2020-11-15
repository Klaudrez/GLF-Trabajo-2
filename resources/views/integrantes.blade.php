@extends('template')

@section('seccion')
<title>Integrantes | Trabajo Grafos</title>
</head>
<body>
<h1>Integrantes del trabajo:</h1>
    <br>
    <table class="table">
      <caption></caption>
      <thead>
        <tr>
          <th scope="col">Integrante</th>
          <th scope="col">Nombre</th>
          <th scope="col">Rut</th>
        </tr>
      </thead>  
      <tbody>
        <tr>
          <th scope="row">#1</th>
          <td>Andrés Parada</td>
          <td>19.793.745-9</td>
        </tr>
        <tr>
          <th scope="row">#2</th>
          <td>Marcelo Silva</td>
          <td>19.744.873-3</td>
        </tr>
        <tr>
          <th scope="row">#3</th>
          <td>Ignacio Delgado</td>
          <td>20.110.127-1</td>
        </tr>
          <th scope="row">#4</th>
          <td>Marcelo Tapia</td>
          <td>19.701.282-k</td>
        </tr>
      </tbody>
    </table>
@endsection
