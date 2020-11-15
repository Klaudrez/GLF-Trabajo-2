@extends('template')

@section('seccion')
<h4>Instrucciones:</h4>
<style type="text/css">
  .hidden{
    display:none;
  }
</style>
<div id="mostrarOcultar" style=" background-color: #d9ad26" class="hidden">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Para:</th>
          <th scope="col">Como hacerlo:  </th>
        </tr>
      </thead>  
      <tbody>
        <tr>
          <th scope="row">Ingresar los estados de los autómatas.</th>
          <td>En el recuadro se han de ingresar valores alfanuméricos, letras o números separados por una ",".</td>
        </tr>
        <tr>
          <th scope="row">Ingresar el alfabeto de los autómatas.</th>
          <td>En el recuadro se han de ingresar valores alfanuméricos, letras o números separados por una ",".</td>
        </tr>
        <tr>
          <th scope="row">Ingresar el estado inicial del autómata.</th>
          <td>En el recuadro se ha de ingresar un solo valor el cual corresponde al estado inicial, este debe pertenecer al conjunto de estados ingresado anteriormente.</td>
        </tr>
          <th scope="row">Ingresar las Funciones de transición.</th>
          <td>Será de la forma estado del autómata, alfabeto, estado del autómata, para agregar más de una transición se han de separar por ";", los valores ingresador han de extistir en los estados y en el alfabeto (Para ingresar una conexión vacía tipear un "@" en el apartado del alfabeto "estado,@,estado").</td>
        </tr>
        </tr>
          <th scope="row">Ingresar los Estados Finales de los autómatas.</th>
          <td>Se han de ingresan los estados finales sepadaros mediante una "," y siempre y cuando estos pertenezcan al conjunto de estados. </td>
        </tr>
        </tr>
          <th scope="row">Concatenación de los autómatas.</th>
          <td>Una vez ingresados los autómatas, estos se referenciaran como un "1" para el autómata 1 y 2 respectivamente.</td>
        </tr>
        </tr>
          <th scope="row">Ejemplo de la clase.</th>
          <td>Conjunto de estados: q1,q2,q3,q4,q5 , Alfabeto: a,b, Estado Inicial: q5, Función de transición: q5,a,q4;q5,b,q3;q4,a,q4;q4,b,q2;q3,a,q4;q3,b,q1;q2,a,q4;q2,b,q1;q1,a,q1;q1,b,q1, Estado(s) final(es): q2,q3,q4,q5.</td>
        </tr>
      </tr>
    </tr>
      <th scope="row">Detalles del algoritmo</th>
      <td>Para ver los resultados en detalle (conjunto de estados, alfabeto, estado inicial,  transiciones, estados finales) puede verlos desde la consola haciendo click derecho/inspeccionar elemento en la pestaña console</td>
    </tr>
      </tbody>
    </table>   
</div>
<input type="button" value="Mostrar Instrucciones" onclick="mostrar();">
<input type="button" value="Ocultar Instrucciones" onclick="ocultar();">
<head>
</head>
<body>
<!doctype html>
<html>
<head>
  <title>Network</title>
  <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js">
  
  </script> 
  <style type="text/css">
    #mynetwork {
      width: 1111px;
      height: 500px;
      border: 1px solid lightgray;
    }
  </style> 
</head>
<body>
<script> 
        function ocultar(){
          document.getElementById('mostrarOcultar').style.display="none";
        }

        function mostrar(){
          document.getElementById('mostrarOcultar').style.display="block";
        }
</script>
<div id="mynetwork"></div>

<!-- <form method="post" action="#"> -->

<!-- Ingreso de datos automata n°1 visual -->    
</body>
</html> 
<br><h3>Datos Autómatas:</h3>
<table border="0"> 
<tr>
<td width="25%">Conjunto de estados Q:</td>
<td width="70%"><input type="text" name="conjuntoQ" placeholder="q1,q2,q3,...,qn" id="Q" > Formato: q1,q2,q3,...,qn </td>
</tr>
<tr>
<td width="25%">Alfabeto:</td>
<td width="70%"><input type="text" name="Alfabeto" placeholder="a,b,c,d,..." id="Alfabeto" > Formato: 1,2,3,...,n </td>
</tr>
<tr>
<td width="25%">Estado inicial:</td>
<td width="70%"><input type="text" name="Inicial" placeholder="q" id="Inicial" > Formato: q1 </td>
</tr>
<tr>
<td width="25%">Función de transición:</td>
<td width="70%"><input type="text" name="Gama" placeholder="q,a,q" id="Gama" > Formato: q1,a,q2;q1,b,q1;...qn,n,qm </td>
<tr>
<td width="25%">Estado(s) final(es):</td>
<td width="70%"><input type="text" name="Finales" placeholder="q1,q2,q3,q4" id="Finales" > Formato: q1,q2,...,qn </td><br>
</tr>
</table>
<button onclick="ValidarEntrada1()">Ingresar autómata 1</button>
<button onclick="ValidarEntrada2()">Ingresar autómata 2</button>
<button onclick="simplificar1()">Simplificar autómata 1 </button>
<button onclick="simplificar2()">Simplificar autómata 2 </button>
<button onclick="reset()">Reset </button>

<br><br><h3>Funciones para ambos autómatas</h3> 
<table border="	0">  
<td>	
<button onclick="Complemento()">Complemento</button>
<button onclick="Union()">Unión</button>
<button onclick="Concatenar()">Concatenación</button>
<input type="text" size="3" name="concatenarinicio" placeholder="inicio" id="Conca1" >
<input type="text" size="3" name="concatenarfinal" placeholder="final" id="Conca2" >
<button onclick="Interseccion()">Intersección</button>
<button onclick="SimplificarCombi()">Simplificar Autómata (Unión,Concatenación,Intersección)</button>
</td>
</table>


<!-- Fin entrada de datos automata n°1 -->


<script type="text/javascript">

var E_inicial1="",E_inicial2="",E_inicial3,E_inicialCombi

var ConjuntoQ1=[],ConjuntoQ2=[],ConjuntoQ3=[],ConjuntoCombi=[]

var Alfabeto1=[],Alfabeto2=[],Alfabeto3=[]

var Gama1=[],Gama2=[],Gama3=[],GamaCombi=[]

var E_Finales1=[],E_Finales2=[],E_Finales3=[],E_FinalesCombi=[]

var node,edge,data,container,options,network


function ValidarEntrada1()
{
    limpiar()

    if(ConjuntoQ1.length>0)
      E_inicial1=ResetearAutomata(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1)

    E_inicial1=document.getElementById("Inicial").value
    var Q=document.getElementById("Q").value
    var A=document.getElementById("Alfabeto").value
    var G=document.getElementById("Gama").value
    var F=document.getElementById("Finales").value

    let valQ=/^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/g
    let valA=/^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/g
    let valF=/^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/g
    let valG=/^[a-zA-Z0-9]+,(@|[a-zA-Z0-9]+),[a-zA-Z0-9]+(;[a-zA-Z0-9]+,(@|[a-zA-Z0-9]+),[a-zA-Z0-9]+)*$/g

    if(Q.length == 0 || A.length == 0 || G.length == 0 || E_inicial1.length == 0 || F.length == 0)
        alert("Hay campos en blanco")
    else
    {
        if(valQ.test(Q) && valA.test(A) && valG.test(G) && valF.test(F) && caractervalido(E_inicial1))
        {
          ConjuntoQ1=Datos_dupli(Q.split(','))
          Alfabeto1=Datos_dupli(A.split(','))
          E_Finales1=Datos_dupli(F.split(','))
          Gama1=_Gama(Datos_dupli(G.split(';')))
          var idFinales = ids(E_Finales1,ConjuntoQ1)
          var idGama = ids_gama(Gama1,ConjuntoQ1)
          var id_ini=Buscar_id(ConjuntoQ1,E_inicial1)-1
          if(validar_estadosx(ConjuntoQ1,E_inicial1))
          { 
            if(validar_estadosx(ConjuntoQ1,E_Finales1) && validar_gama(ConjuntoQ1,Alfabeto1,Gama1))
            {
              ConjuntoQ1=cambiarcaracter(ConjuntoQ2,ConjuntoQ1)
              E_inicial1 =  ConjuntoQ1[id_ini]
              E_Finales1 = e_finales(idFinales,ConjuntoQ1)
              Gama1 = gama(idGama,ConjuntoQ1)
              ConjuntoQ1.splice(0,0,E_inicial1)
              ConjuntoQ1=Datos_dupli(ConjuntoQ1)
          

              Gama1=epsilon(Gama1)  
              ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
              Gama3=copiararray(Gama1,Gama2)
              Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
              E_Finales3=copiararray(E_Finales1,E_Finales2) 
              
              mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")

              graph()
            }
            else{
              alert("Lo datos ingresados no validos, deben estar contenidos en el alfabeto o en los estados")
              E_inicial1=ResetearAutomata(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1)
            }
          }
          else{
            alert("Lo datos ingresados no validos, el estado inicial debe estar contenido en el conjunto de estados")
            E_inicial1=ResetearAutomata(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1)
          }
        }
        else
          alert("Formato ingresado no valido") 
    }
}

function ValidarEntrada2()
{
    limpiar()
    if(ConjuntoQ2.length>0){

      E_inicial2=ResetearAutomata(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2)
    }

    E_inicial2=document.getElementById("Inicial").value
    var Q=document.getElementById("Q").value
    var A=document.getElementById("Alfabeto").value
    var G=document.getElementById("Gama").value
    var F=document.getElementById("Finales").value

    let valQ=/^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/g
    let valA=/^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/g
    let valF=/^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/g
    let valg=/^[a-zA-Z0-9]+,(@|[a-zA-Z0-9]+),[a-zA-Z0-9]+(;[a-zA-Z0-9]+,(@|[a-zA-Z0-9]+),[a-zA-Z0-9]+)*$/g

    if(Q.length == 0 || A.length == 0 || G.length == 0 || E_inicial2.length == 0 || F.length == 0)
        alert("Hay campos en blanco")
    else
    {
        
        if(valQ.test(Q) && valA.test(A) && valg.test(G) && valF.test(F) && caractervalido(E_inicial2))
        {
          
          ConjuntoQ2=Datos_dupli(Q.split(','))
          Alfabeto2=Datos_dupli(A.split(','))
          E_Finales2=Datos_dupli(F.split(','))
          Gama2=_Gama(Datos_dupli(G.split(';')))
          var idFinales = ids(E_Finales2,ConjuntoQ2)
          var idGama = ids_gama(Gama2,ConjuntoQ2)
          var id_ini=Buscar_id(ConjuntoQ2,E_inicial2)-1
          if(validar_estadosx(ConjuntoQ2,E_inicial2))
          {
            if(validar_estadosx(ConjuntoQ2,E_Finales2) && validar_gama(ConjuntoQ2,Alfabeto2,Gama2))
            {
              ConjuntoQ2=cambiarcaracter(ConjuntoQ1,ConjuntoQ2)

              E_inicial2 =  ConjuntoQ2[id_ini]
              E_Finales2 = e_finales(idFinales,ConjuntoQ2)
              Gama2 = gama(idGama,ConjuntoQ2)
              ConjuntoQ2.splice(0,0,E_inicial2)
              ConjuntoQ2=Datos_dupli(ConjuntoQ2)
            
          
              Gama2=epsilon(Gama2)
              
              ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
              Gama3=copiararray(Gama1,Gama2)
              Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
              E_Finales3=copiararray(E_Finales1,E_Finales2)

              mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")

              graph()
            }
            else{
              alert("Lo datos ingresados no validos, deben estar contenidos en el alfabeto o en los estados")
              E_inicial2=ResetearAutomata(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2)
            }
          }
          else{
            alert("Lo datos ingresados no validos, el estado inicial debe estar contenido en el conjunto de estados")
            E_inicial2=ResetearAutomata(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2)
          }
        }
        else
          alert("Formato ingresado no valido") 
    }  
}

function reset()
{
  limpiar()
  console.log("Datos borrados.")
  E_inicial1=ResetearAutomata(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1)
  console.log(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1)
  E_inicial2=ResetearAutomata(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2)
  console.log(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2)
  E_inicial3=ResetearAutomata(ConjuntoQ3,Alfabeto3,Gama3,E_inicial3,E_Finales3)
  console.log(ConjuntoQ3,Alfabeto3,Gama3,E_inicial3,E_Finales3)
  E_inicialCombi=ResetearAutomata(ConjuntoCombi,[],GamaCombi,E_inicialCombi,E_FinalesCombi)
  console.log(ConjuntoCombi,[],GamaCombi,E_inicialCombi,E_FinalesCombi)
  graph()
}

function ResetearAutomata(estados,alfabeto,gama,e_inicial,e_finales)
{
  estados=estados.splice(0,estados.length)
  alfabeto=alfabeto.splice(0,alfabeto.length)
  gama=gama.splice(0,gama.length)
  e_inicial=null
  e_finales=e_finales.splice(0,e_finales.length)
  return e_inicial
}

function validar_estadosx(comparador,a_comparar)
{
  if(Array.isArray(a_comparar))
  {
    for(let i=0;i<a_comparar.length;i++)
    {
      if(!comparador.includes(a_comparar[i]))
        return false
    }
  }
  else
      if(!comparador.includes(a_comparar))
        return false
  return true
}

function validar_gama(comparador1,comparador2,a_comparar)
{
  for(let i=0;i<a_comparar.length;i++)
  {
    if(!comparador1.includes(a_comparar[i][0]))
      return false
    if(!(comparador2.includes(a_comparar[i][1])||a_comparar[i][1]=="$"))
      return false
    if(!comparador1.includes(a_comparar[i][2]))
      return false
  }
  return true
}

function limpiar()
{
  console.clear()
}

function mostrardatos(conjunto,alfabeto,gama,e_ini,e_final,Nautomata)
{
    console.log("Estados "+Nautomata+":",conjunto)
    console.log("Alfabeto "+Nautomata+":",alfabeto)
    console.log("Transiciones "+Nautomata+":",gama)
    console.log("Estados finales "+Nautomata+":",e_final)
    console.log("Estado inicial "+Nautomata+":",e_ini)

    console.log("Tabla de estados "+Nautomata+":",añadirconex3(tabla_estados(conjunto,alfabeto,gama),gama)) 
}

function simplificar1()
{
  limpiar()
  if(ConjuntoQ1.length>0)
  {
    if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1))
    {
      if(ConjuntoQ1.length>1)
        optimizar(ConjuntoQ1,ConjuntoQ2,Alfabeto1,Gama1,Gama2,E_Finales1)
      else
        alert("No es posible reducir un automata afd con un solo estado")
    }
    else
    {
      var afd=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ1,Alfabeto1,Gama1),Gama1),E_inicial1,E_Finales1,ConjuntoQ1,Alfabeto1,Gama1)
      E_inicial1=afd[0]
      ConjuntoQ1=afd[1]
      Alfabeto1=afd[2]
      Gama1=afd[3]
      E_Finales1=afd[4]

      CojuntoQ1=cambiarcaracter(ConjuntoQ2,ConjuntoQ1)
      Gama1=cambiarcaractergama(Gama2,Gama1)
      
      ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
      Gama3=copiararray(Gama1,Gama2)
      Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
      E_Finales3=copiararray(E_Finales1,E_Finales2) 
      
      mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1") 

      graph()
      
      alert("El automata no era afd, por lo cual se transformo en afd. Presione simplificar1 nuevamente para llevar a cabo la reduccion")
    }
  }
  else
    alert("No se ha ingresado un automata")
}

function simplificar2()
{
  limpiar()
  if(ConjuntoQ2.length>0)
  {
    if(EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
    {
      if(ConjuntoQ2.length>1)
        optimizar(ConjuntoQ2,ConjuntoQ1,Alfabeto2,Gama2,Gama1,E_Finales2)
      else
        alert("No es posible reducir un automata afd con un solo estado")
    }
    else
    {
      var afd=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ2,Alfabeto2,Gama2),Gama2),E_inicial2,E_Finales2,ConjuntoQ2,Alfabeto2,Gama2)
      E_inicial2=afd[0]
      ConjuntoQ2=afd[1]
      Alfabeto2=afd[2]
      Gama2=afd[3]
      E_Finales2=afd[4]

      CojuntoQ2=cambiarcaracter(ConjuntoQ1,ConjuntoQ2)
      Gama2=cambiarcaractergama(Gama1,Gama2)
      
      ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
      Gama3=copiararray(Gama1,Gama2)
      Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
      E_Finales3=copiararray(E_Finales1,E_Finales2) 

      mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")

      graph()
      
      alert("El automata no era afd, por lo cual se transformo en afd. Presione simplificar1 nuevamente para llevar a cabo la reduccion")
    }
  }
  else
    alert("No se ha ingresado un automata")
}

function SimplificarCombi()
{
  limpiar()
  if(ConjuntoQ1.length>0 && ConjuntoQ2.length>0 && ConjuntoCombi.length>0)
  {
    if(EsAFD(ConjuntoCombi,Alfabeto1,GamaCombi))
    {
      if(ConjuntoCombi.length>1)
        optimizar(ConjuntoCombi,[],Alfabeto1,GamaCombi,[],E_FinalesCombi)
      else
        alert("No es posible reducir un automata afd con un solo estado")
    }
    else
    {
      var afd=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoCombi,Alfabeto1,GamaCombi),GamaCombi),E_inicialCombi,E_FinalesCombi,ConjuntoCombi,Alfabeto1,GamaCombi)
      E_inicialCombi=afd[0]
      ConjuntoCombi=afd[1]
      Alfabeto1=afd[2]
      GamaCombi=afd[3]
      E_FinalesCombi=afd[4]

      ConjuntoQ3=copiararray(ConjuntoCombi,[])
      Gama3=copiararray(GamaCombi,[])
      Alfabeto3=copiararray(Alfabeto1,[])
      E_Finales3=copiararray(E_FinalesCombi,[]) 
      
      mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"A combinado") 

      graph()
      
      alert("El automata no era afd, por lo cual se transformo en afd. Presione el boton nuevamente para llevar a cabo la reduccion")
    }
  }
  else
    alert("No ha ingresado ambos automatas o no ha combinado dichos automatas")
}

function Complemento()
{
  limpiar()
  if(ConjuntoQ1.length>0 && ConjuntoQ2.length==0 && ConjuntoCombi.length==0)
  {
    if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1))
    {  
      complemento(ConjuntoQ1,E_Finales1)
      mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
    }
    else
    {
      var afd=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ1,Alfabeto1,Gama1),Gama1),E_inicial1,E_Finales1,ConjuntoQ1,Alfabeto1,Gama1)
      E_inicial1=afd[0]
      ConjuntoQ1=afd[1]
      Alfabeto1=afd[2]
      Gama1=afd[3]
      E_Finales1=afd[4]
      
      ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
      Gama3=copiararray(Gama1,Gama2)
      Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
      E_Finales3=copiararray(E_Finales1,E_Finales2) 

      complemento(ConjuntoQ1,E_Finales1)
      mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
      graph()
    }
  }
  else
  {
    if(ConjuntoQ1.length==0 && ConjuntoQ2.length>0 && ConjuntoCombi.length==0)
    {
      if(EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
      {
          complemento(ConjuntoQ2,E_Finales2)
          mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")
      }
      else
      {
        var afd=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ2,Alfabeto2,Gama2),Gama2),E_inicial2,E_Finales2,ConjuntoQ2,Alfabeto2,Gama2)
        E_inicial2=afd[0]
        ConjuntoQ2=afd[1]
        Alfabeto2=afd[2]
        Gama2=afd[3]
        E_Finales2=afd[4]
        
        ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
        Gama3=copiararray(Gama1,Gama2)
        Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
        E_Finales3=copiararray(E_Finales1,E_Finales2) 

        complemento(ConjuntoQ2,E_Finales2)
        mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")
        graph()
      }
    }
    else
    {
      if(ConjuntoQ1.length>0 && ConjuntoQ2.length>0 && ConjuntoCombi.length==0)
      {
        if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1) && EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
        {
          complemento(ConjuntoQ1,E_Finales1)
          complemento(ConjuntoQ2,E_Finales2)
          mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
          mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")
        }
        else
        {
          if(!EsAFD(ConjuntoQ1,Alfabeto1,Gama1) && EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
          {
            var afd=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ1,Alfabeto1,Gama1),Gama1),E_inicial1,E_Finales1,ConjuntoQ1,Alfabeto1,Gama1)
            E_inicial1=afd[0]
            ConjuntoQ1=afd[1]
            Alfabeto1=afd[2]
            Gama1=afd[3]
            E_Finales1=afd[4]

            complemento(ConjuntoQ1,E_Finales1)
            complemento(ConjuntoQ2,E_Finales2)
      
            ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
            Gama3=copiararray(Gama1,Gama2)
            Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
            E_Finales3=copiararray(E_Finales1,E_Finales2) 

            mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
            mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")
            graph()
          }
          else
          {
            if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1) && !EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
            {
              var afd=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ2,Alfabeto2,Gama2),Gama2),E_inicial2,E_Finales2,ConjuntoQ2,Alfabeto2,Gama2)
              E_inicial2=afd[0]
              ConjuntoQ2=afd[1]
              Alfabeto2=afd[2]
              Gama2=afd[3]
              E_Finales2=afd[4]
              
              complemento(ConjuntoQ1,E_Finales1)
              complemento(ConjuntoQ2,E_Finales2)

              ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
              Gama3=copiararray(Gama1,Gama2)
              Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
              E_Finales3=copiararray(E_Finales1,E_Finales2) 

              mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
              mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")
              graph()
            }
            else
            {
              var afd1=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ1,Alfabeto1,Gama1),Gama1),E_inicial1,E_Finales1,ConjuntoQ1,Alfabeto1,Gama1)
              E_inicial1=afd1[0]
              ConjuntoQ1=afd1[1]
              Alfabeto1=afd1[2]
              Gama1=afd1[3]
              E_Finales1=afd1[4]

              complemento(ConjuntoQ1,E_Finales1)

              var afd2=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ2,Alfabeto2,Gama2),Gama2),E_inicial2,E_Finales2,ConjuntoQ2,Alfabeto2,Gama2)
              E_inicial2=afd2[0]
              ConjuntoQ2=afd2[1]
              Alfabeto2=afd2[2]
              Gama2=afd2[3]
              E_Finales2=afd2[4]

              ConjuntoQ2=cambiarcaracter(ConjuntoQ1,ConjuntoQ2)
              Gama2=cambiarcaractergama(ConjuntoQ1,Gama2)

              complemento(ConjuntoQ2,E_Finales2)

              ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
              Gama3=copiararray(Gama1,Gama2)
              Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
              E_Finales3=copiararray(E_Finales1,E_Finales2) 

              mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
              mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")
              graph()
            }
          }
        }
      }
      else
      {
        if(ConjuntoQ1.length>0 && ConjuntoQ2.length>0 && ConjuntoCombi.length>0)
        {
          if(EsAFD(ConjuntoCombi,Alfabeto1,GamaCombi))
          {
            complemento(ConjuntoCombi,E_FinalesCombi)
            mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ac")
          }
          else
          {
            var afd1=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoCombi,Alfabeto1,GamaCombi),GamaCombi),E_inicialCombi,E_FinalesCombi,ConjuntoCombi,Alfabeto1,GamaCombi)
            E_inicialCombi=afd1[0]
            ConjuntoCombi=afd1[1]
            Alfabeto1=afd1[2]
            GamaCombi=afd1[3]
            E_FinalesCombi=afd1[4]

            complemento(ConjuntoCombi,E_FinalesCombi)

            ConjuntoQ3=copiararray(ConjuntoCombi,[])
            Gama3=copiararray(GamaCombi,[])
            Alfabeto3=copiararray(Alfabeto1,[])
            E_Finales3=copiararray(E_FinalesCombi,[]) 

            mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ac")
            graph()
          }
        }
        else
        {
          if(ConjuntoQ1.length==0 && ConjuntoQ2.length==0 && ConjuntoCombi.length==0)
            alert("No se han ingresado automatas")
        }
      }
    }
  }
}

function Union()
{
  limpiar()
  if(ConjuntoQ1.length>0 && ConjuntoQ2.length>0)
  {
    if(compararalfabeto(Alfabeto1,Alfabeto2))
    {
      mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
      mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")

      var inicio1=ConjuntoQ1[0]
      var inicio2=ConjuntoQ2[0]

      E_inicialCombi="X"

      ConjuntoCombi=copiararray(ConjuntoQ1,ConjuntoQ2)
      ConjuntoCombi.splice(0,0,E_inicialCombi)

      GamaCombi=copiararray(Gama1,Gama2)
      
      GamaCombi.splice(0,0,conexionu(inicio1))
      GamaCombi.splice(0,0,conexionu(inicio2))

      GamaCombi=epsilon(GamaCombi)

      E_FinalesCombi=copiararray(E_Finales1,E_Finales2)

      ConjuntoQ3=copiararray(ConjuntoCombi,[])
      Gama3=copiararray(GamaCombi,[])
      Alfabeto3=copiararray(Alfabeto1,[])
      E_Finales3=copiararray(E_FinalesCombi,[]) 

      mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Au")
      graph()
    }
    else
      alert("Los automatas no tienen coincidencias en sus alfabetos")
  }
  else
    alert("Debe ingresar ambos automatas")
}

function epsilon(transiciones)
{
  for(let i=0;i<transiciones.length;i++)
    if(transiciones[i][1].charCodeAt()==64)
      transiciones[i][1]=String.fromCharCode(36)
  return transiciones
}

function conexionu(inicio)
{
  var conexion=[]
  for(let i=0;i<3;i++)
  {
    if(i==0)
      conexion.push("X")
    if(i==1)
      conexion.push("@")
    if(i==2)
      conexion.push(inicio)
  }
  return conexion
}

function Concatenar()
{
  limpiar()
  if(ConjuntoQ1.length>0 && ConjuntoQ2.length>0)
  {
    if(compararalfabeto(Alfabeto1,Alfabeto2))
    {
      var a1=document.getElementById("Conca1").value
      var a2=document.getElementById("Conca2").value
      if(a1.length>0 && a2.length>0)
      {
        if((a1=="1" || a1=="2") && (a2=="1" || a2=="2") && a1!=a2)
        {
          if(a1=="1")
          {
            mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")
            mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")

            ConjuntoCombi=copiararray(ConjuntoQ1,ConjuntoQ2)
            GamaCombi=copiararray(Gama1,Gama2)
            E_FinalesCombi=copiararray(E_Finales1,E_Finales2)

            E_inicialCombi=E_inicial1

            var copia_e_f=copiararray(E_Finales1,[])

            for(let i=0;i<=copia_e_f.length;i++)
            {
              i=0
              GamaCombi.splice(0,0,concatenarconexion(copia_e_f[i],E_inicial2))
              copia_e_f.splice(i,1) 
              E_FinalesCombi.splice(i,1)
            }

            GamaCombi=epsilon(GamaCombi)

           
            ConjuntoQ3=copiararray(ConjuntoCombi,[])
            Gama3=copiararray(GamaCombi,[])
            Alfabeto3=copiararray(Alfabeto1,[])
            E_Finales3=copiararray(E_FinalesCombi,[]) 
            mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ac")

            graph()
          }
          else
          {
            mostrardatos(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2,"A2")
            mostrardatos(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1,"A1")

            ConjuntoCombi=copiararray(ConjuntoQ2,ConjuntoQ1)
            GamaCombi=copiararray(Gama2,Gama1)
            E_FinalesCombi=copiararray(E_Finales2,E_Finales1)

            E_inicialCombi=E_inicial2

            var copia_e_f=copiararray(E_Finales2,[])

            for(let i=0;i<=copia_e_f.length;i++)
            {
              i=0
              GamaCombi.splice(0,0,concatenarconexion(copia_e_f[i],E_inicial1))
              copia_e_f.splice(i,1) 
              E_FinalesCombi.splice(i,1)
            }

            GamaCombi=epsilon(GamaCombi)

           

            ConjuntoQ3=copiararray(ConjuntoCombi,[])
            Gama3=copiararray(GamaCombi,[])
            Alfabeto3=copiararray(Alfabeto1,[])
            E_Finales3=copiararray(E_FinalesCombi,[]) 
            mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ac")

            graph()
          }
        }
        else
          alert("Los automatas ingresados no coinciden con [1,2] o ingreso el mismo automata dos veces")
      }
      else
        alert("No deben quedar en blanco los campos de concatenacion")
    }
    else
      alert("No comparten concordancias en sus alfabetos")
  }
  else
    alert("Debe ingresar ambos automatas")
}

function Interseccion()
{
  if(ConjuntoQ1.length>0 && ConjuntoQ2.length>0)
  {
    if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1) && EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
    {
      complemento(ConjuntoQ1,E_Finales1)
      complemento(ConjuntoQ2,E_Finales2)
      Union()
      var afd1=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoCombi,Alfabeto1,GamaCombi),GamaCombi),E_inicialCombi,E_FinalesCombi,ConjuntoCombi,Alfabeto1,GamaCombi)
      E_inicialCombi=afd1[0]
      ConjuntoCombi=afd1[1]
      Alfabeto1=afd1[2]
      GamaCombi=afd1[3]
      E_FinalesCombi=afd1[4]

      complemento(ConjuntoCombi,E_FinalesCombi)

      ConjuntoQ3=copiararray(ConjuntoCombi,[])
      Gama3=copiararray(GamaCombi,[])
      Alfabeto3=copiararray(Alfabeto1,[])
      E_Finales3=copiararray(E_FinalesCombi,[]) 

      mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ai")
      graph()

    }
    else
    {
      if(!EsAFD(ConjuntoQ1,Alfabeto1,Gama1) && EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
      {
        var afd1=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ1,Alfabeto1,Gama1),Gama1),E_inicial1,E_Finales1,ConjuntoQ1,Alfabeto1,Gama1)
        E_inicial1=afd1[0]
        ConjuntoQ1=afd1[1]
        Alfabeto1=afd1[2]
        Gama1=afd1[3]
        E_Finales1=afd1[4]

        complemento(ConjuntoQ1,E_Finales1)
        complemento(ConjuntoQ2,E_Finales2)

        Union()

        var afdc=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoCombi,Alfabeto1,GamaCombi),GamaCombi),E_inicialCombi,E_FinalesCombi,ConjuntoCombi,Alfabeto1,GamaCombi)
        E_inicialCombi=afdc[0]
        ConjuntoCombi=afdc[1]
        Alfabeto1=afdc[2]
        GamaCombi=afdc[3]
        E_FinalesCombi=afdc[4]

        complemento(ConjuntoCombi,E_FinalesCombi)

        ConjuntoQ3=copiararray(ConjuntoCombi,[])
        Gama3=copiararray(GamaCombi,[])
        Alfabeto3=copiararray(Alfabeto1,[])
        E_Finales3=copiararray(E_FinalesCombi,[]) 

        mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ai")
        graph()

      }
      else
      {
        if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1) && !EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
        {
          var afd2=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ2,Alfabeto2,Gama2),Gama2),E_inicial2,E_Finales2,ConjuntoQ2,Alfabeto2,Gama2)
          E_inicial2=afd2[0]
          ConjuntoQ2=afd2[1]
          Alfabeto2=afd2[2]
          Gama2=afd2[3]
          E_Finales2=afd2[4]

          complemento(ConjuntoQ1,E_Finales1)
          complemento(ConjuntoQ2,E_Finales2)

          Union()

          var afdc=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoCombi,Alfabeto1,GamaCombi),GamaCombi),E_inicialCombi,E_FinalesCombi,ConjuntoCombi,Alfabeto1,GamaCombi)
          E_inicialCombi=afdc[0]
          ConjuntoCombi=afdc[1]
          Alfabeto1=afdc[2]
          GamaCombi=afdc[3]
          E_FinalesCombi=afdc[4]

          complemento(ConjuntoCombi,E_FinalesCombi)

          ConjuntoQ3=copiararray(ConjuntoCombi,[])
          Gama3=copiararray(GamaCombi,[])
          Alfabeto3=copiararray(Alfabeto1,[])
          E_Finales3=copiararray(E_FinalesCombi,[]) 

          mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ai")
          graph()
        }
        else
        {
          var afd1=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ1,Alfabeto1,Gama1),Gama1),E_inicial1,E_Finales1,ConjuntoQ1,Alfabeto1,Gama1)
          E_inicial1=afd1[0]
          ConjuntoQ1=afd1[1]
          Alfabeto1=afd1[2]
          Gama1=afd1[3]
          E_Finales1=afd1[4]

          complemento(ConjuntoQ1,E_Finales1)

          var afd2=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoQ2,Alfabeto2,Gama2),Gama2),E_inicial2,E_Finales2,ConjuntoQ2,Alfabeto2,Gama2)
          E_inicial2=afd2[0]
          ConjuntoQ2=afd2[1]
          Alfabeto2=afd2[2]
          Gama2=afd2[3]
          E_Finales2=afd2[4]

          ConjuntoQ2=cambiarcaracter(ConjuntoQ1,ConjuntoQ2)
          Gama2=cambiarcaractergama(ConjuntoQ1,Gama2)

          complemento(ConjuntoQ2,E_Finales2)

          Union()

          var afdc=afnd_to_afd(añadirconex3(tabla_estados(ConjuntoCombi,Alfabeto1,GamaCombi),GamaCombi),E_inicialCombi,E_FinalesCombi,ConjuntoCombi,Alfabeto1,GamaCombi)
          E_inicialCombi=afdc[0]
          ConjuntoCombi=afdc[1]
          Alfabeto1=afdc[2]
          GamaCombi=afdc[3]
          E_FinalesCombi=afdc[4]

          complemento(ConjuntoCombi,E_FinalesCombi)

          ConjuntoQ3=copiararray(ConjuntoCombi,[])
          Gama3=copiararray(GamaCombi,[])
          Alfabeto3=copiararray(Alfabeto1,[])
          E_Finales3=copiararray(E_FinalesCombi,[]) 

          mostrardatos(ConjuntoCombi,Alfabeto1,GamaCombi,E_inicialCombi,E_FinalesCombi,"Ai")
          graph()
        }
      }
    }
  }
  else
    alert("Debe ingresar ambos automatas para realizar la interseccion")
}

function concatenarconexion(inicio,fin)
{
  var resultado=[]
  for(let i=0;i<3;i++)
  {
    if(i==0)
      resultado.push(inicio)
    if(i==1)
      resultado.push("@")
    if(i==2)
      resultado.push(fin)
  }
  return resultado
}
                    //q0,r0
function comparar_eini(estado1,estado2)
{
  if(estado1!="" && estado2!="")
  {
      if(estado1==estado2)
      {
        if(estado2[0].charCodeAt()==57 || estado2[0].charCodeAt()==90 || estado2[0].charCodeAt()==122)
          estado2=estado2.replace(estado2[0],String.fromCharCode(estado2[0].charCodeAt()-1))
        else
          estado2=estado2.replace(estado2[0],String.fromCharCode(estado2[0].charCodeAt()+1))
        return estado2
      }
      else
        return estado1
  }
  return estado1

}

function estados3deE(estado,gama)
{
  var resultado=[]
  resultado.push(estado)
  for(let i=0;i<gama.length;i++)
    if(estado==gama[i][0]&&gama[i][1]=="$")
    {
      resultado.push(gama[i][2])
      estado=gama[i][2]
    }
  return resultado
}

function tiene3(estado,gama)
{
  for(let i=0;i<gama.length;i++)
    if(estado==gama[i][0]&&gama[i][1]=="$")
      return true
  return false
}

function copia(gama)
{
  var resultado=[]
  for(let i=0;i<gama.length;i++)
  {
    var conex=[]
    for(let j=0;j<3;j++)
      conex.push(gama[i][j])
    resultado.push(conex)
  }
  return resultado
}

function estados3alfaconsumido(estado,gama)
{
  var respuesta=""
  var copiag=copia(gama)
  while(tiene3(estado,copiag))
  {
    var estados3=estados3deE(estado,copiag)

    for(let i=estados3.length-1;i>0;i--)
    {
      if(tiene3(estados3[i],copiag))
        respuesta+=estados3alfaconsumido(estados3[i],copiag) 
    	for(let j=0;j<copiag.length;j++)
      {
        if(estados3[i]==copiag[j][2] && copiag[j][1]=="$" && copiag[j][0]==estados3[i-1])
        {
          copiag.splice(j,1)
          j=0
          respuesta=respuesta +","+estados3[i]
        }
      }
     }
  }
  return respuesta
}

function estado3alfasinconsumir(estado,alfa,gama)
{
  var respuesta=""
  var copiag=copia(gama)
  while(tiene3(estado,copiag))
  {
    var estados3=estados3deE(estado,copiag)
    for(let i=estados3.length-1;i>0;i--)
    {
      if(tiene3(estados3[i],copiag))
        respuesta+=estado3alfasinconsumir(estados3[i],alfa,copiag)
      for(let j=0;j<copiag.length;j++)
      {
        if(estados3[i]==copiag[j][0] && copiag[j][1]==alfa)
          respuesta=respuesta + "," + copiag[j][2]
        if(estados3[i]==copiag[j][2] && copiag[j][1]=="$" && copiag[j][0]==estados3[i-1])
        {
            copiag.splice(j,1)
            j=0
        }
      }
    }
  }
  return respuesta
}

function añadirconex3(matriz,gama)
{
  for(let i=1;i<matriz.length;i++)
  {
    for(let j=1;j<matriz[0].length;j++)
    {
      var respuesta=""
      respuesta+=estados3alfaconsumido(matriz[i][j],gama)
      respuesta+=estado3alfasinconsumir(matriz[i][0],matriz[0][j],gama)
      if(matriz[i][j]!="-")
      {
        matriz[i][j]+=respuesta
        matriz[i][j]=artostr(Datos_dupli(matriz[i][j].split(",")))
      }
      else
      {
        if(respuesta!="")
        {
          matriz[i][j]=respuesta.substring(1,respuesta.length)
          matriz[i][j]=artostr(Datos_dupli(matriz[i][j].split(",")))
        }
      }
    }
  }
  return matriz
}

function copiararray(datos1,datos2)
{
  var resultado=[]
  for(let index=0;index<(datos1.length+datos2.length);index++)
  {
    if(index<datos1.length)
      resultado.push(datos1[index])
    else
      resultado.push(datos2[index-datos1.length])
  }
  return resultado
}

function cambiarcaracter(estados1,estados2)
{
  for(let i=0;i<estados1.length;i++)
  {
    if(estados2.includes(estados1[i]))
    {
      var indice=estados2.indexOf(estados1[i])
      var aux=estados2[indice]
      while(estados2.includes(aux) || estados1.includes(aux) )
      {
          if(aux[0].charCodeAt()==57 || aux[0].charCodeAt()==90 ||  aux[0].charCodeAt()==122){

          if(aux[0].charCodeAt()==57){
            aux=aux.replace(aux[0],String.fromCharCode(aux[0].charCodeAt()+8))
          }
          if(aux[0].charCodeAt()==90){
            aux=aux.replace(aux[0],String.fromCharCode(aux[0].charCodeAt()+7))
          }
          if(aux[0].charCodeAt()==122){
            aux=aux.replace(aux[0],String.fromCharCode(aux[0].charCodeAt()-74))
          }
         }
         else
              aux=aux.replace(aux[0],String.fromCharCode(aux[0].charCodeAt()+1)) 
      }
      estados2[indice]=aux
    }
  }
 return estados2
}

//               nuevas funciones
function ids(estados,conjunto)
{
	var ids=[]
  for(let i=0;i<conjunto.length;i++)
  {
  	if(conjunto.includes(estados[i]))
  		ids.push(conjunto.indexOf(estados[i]))
  }
  return ids
}
function e_finales(ids,conjunto)
{
	var e_finales=[]
	for(let i=0;i<ids.length;i++)
  	e_finales.push(conjunto[ids[i]])
  return e_finales
}
function ids_gama(gama,conjunto)
{
	var gamaN=[]
  for(let i=0;i<gama.length;i++)
  if(conjunto.includes(gama[i][0])&&conjunto.includes(gama[i][2]))
  	gamaN.push(añadirtransicion(conjunto.indexOf(gama[i][0]),gama[i][1],conjunto.indexOf(gama[i][2])))
  return gamaN
}
function gama(ids,conjunto)
{
	var gama_r=[]
  for(let i=0;i<ids.length;i++)
  	gama_r.push(añadirtransicion(conjunto[ids[i][0]],ids[i][1],conjunto[ids[i][2]]))
  return gama_r
}
//               nuevas funciones/>

function cambiarcaractergama(g1,g2)
{
  for(let i=0;i<g1.length;i++)
    for(let j=0;j<g2.length;j++)
    {
      if(g1[i][0]==g2[j][0])
        g2[j][0]=compararletra(g1[i][0],g2[j][0])
      if(g1[i][0]==g2[j][2])
        g2[j][2]=compararletra(g1[i][0],g2[j][2])
      if(g1[i][2]==g2[j][0])
        g2[j][0]=compararletra(g1[i][2],g2[j][0])
      if(g1[i][2]==g2[j][2])
        g2[j][2]=compararletra(g1[i][2],g2[j][2])
    } 
  return g2
}

function compararletra(palabra1,palabra2)
{
  if(palabra1.length>0 && palabra2.length>0)
  {
	if(caractervalido(palabra1[0]) && caractervalido(palabra2[0]))
  {
  	if(palabra1==palabra2)
    {
    	if(palabra2[0].charCodeAt()==57 || palabra2[0].charCodeAt()==90 || palabra2[0].charCodeAt()==122){
      	
        if(palabra2[0].charCodeAt()==57){
          palabra2=palabra2.replace(palabra2[0],String.fromCharCode(palabra2[0].charCodeAt()+8))
        }
        if(palabra2[0].charCodeAt()==90){
          palabra2=palabra2.replace(palabra2[0],String.fromCharCode(palabra2[0].charCodeAt()+7))
        }
        if(palabra2[0].charCodeAt()==122){
          palabra2=palabra2.replace(palabra2[0],String.fromCharCode(palabra2[0].charCodeAt()-74))
        }
      }
      else
      	palabra2=palabra2.replace(palabra2[0],String.fromCharCode(palabra2[0].charCodeAt()+1))
    }
    return palabra2
  }
  }
  
}

function caractervalido(palabra)
{
	for(let i=0;i<palabra.length;i++)
  {
  	if(palabra[i].charCodeAt()<48 || (palabra[i].charCodeAt()>57 && palabra[i].charCodeAt()<65) || (palabra[i].charCodeAt()>90 && palabra[i].charCodeAt()<97) || palabra[i].charCodeAt()>122)
    	return false
  }
  return true
}

function optimizar(estados1,estados2,alfa,gama1,gama2,estadosf)
{
  var matriz_d=matriz_distinguible(tabla_estados(estados1,alfa,gama1),estados1,alfa,estadosf)
  if(equivalencias(matriz_d))
  {
    while(equivalencias(matriz_d))
    {
      var id_d=buscar_disti(matriz_d)
      console.log("Matriz distinguible: ",matriz_distinguible(tabla_estados(estados1,alfa,gama1),estados1,alfa,estadosf))
      console.log("Estados: ",estados1)
      console.log("Alfabeto: ",alfa)
      console.log("Transiciones: ",gama1)
      for(let index=0;index<gama1.length;index++)
      {
        if(gama1[index][0]==estados1[Buscar_id(estados1,id_d[1])-1])
        {
          gama1.splice(index,1)
          index=0
        }
        if(gama1[index][2]==estados1[Buscar_id(estados1,id_d[1])-1])
        {
          var aux=[]
          aux.push(gama1[index][0])
          aux.push(gama1[index][1])
          aux.push(estados1[Buscar_id(estados1,id_d[0])-1])

          gama1.splice(index,1,aux)
          index=0
        }
      }
    estados1.splice(Buscar_id(estados1,id_d[1])-1,1)
    console.log("Matriz distinguible: ",matriz_distinguible(tabla_estados(estados1,alfa,gama1),estados1,alfa,estadosf))
    console.log("Estados: ",estados1)
    console.log("Alfabeto: ",alfa)
    console.log("Transiciones: ",gama1)
      
    ConjuntoQ3=copiararray(estados1,estados2)
    Gama3=copiararray(gama1,gama2)

    }
    graph()
  }
  else
    alert("El automata ya se encuentra en su estado minimo")

  
  

}

//Funciones de creacion y visualizacion de automatas

function visestado(arreglo)
{
  var object=[]
  for(let index=0;index<arreglo.length;index++)
  {
    const element=arreglo[index]
    object.push({id: index+1, label: element})
  }
  return object
}

function alfabetoxestado(arreglo)
{
  var object=[]
  arreglo.forEach(element => {object.push({from: Buscar_id(ConjuntoQ3,element[0]), to: Buscar_id(ConjuntoQ3,element[2]), label: element[1]})})
  return object
}

function _Gama(arreglo)
{
  var gama=[]
  for(let index=0;index<arreglo.length;index++)
    gama.push(arreglo[index].split(','))
  return gama
}

function Buscar_id(arreglo, nombre)
{
  for(let index=0;index<arreglo.length;index++)
  {
    if(nombre==arreglo[index])
      return index+1
  }
    
}

function Datos_dupli(arreglo)
{
  for(let index=0;index<arreglo.length;index++)
    for(let jdex=0;jdex<arreglo.length;jdex++)
    {
      if(index!=jdex)
      {
        if(arreglo[index]==arreglo[jdex])
          arreglo.splice(jdex,1)
      }
    }
  return arreglo
}


function Comparar(arr1,arr2)
{
  for(let z=0;z<arr1.length;z++)
  {
    if(arr1[z]==arr2[z])
      return true
  }
  return false
}

function graph()
{
    node=new vis.DataSet(visestado(ConjuntoQ3))
    edge=new vis.DataSet(alfabetoxestado(Gama3))
    container= document.getElementById('mynetwork')
    data={nodes: node, edges: edge}
    options={edges:{arrows:{to:{enabled:true}}}}
    network= new vis.Network(container, data, options)

}
 
 //Fin funciones visualizacion y creacion de automata

function tabla_estados(estados,alfabeto,Ftrans)
{
  var matriz=[]
  for(let index=0;index<=estados.length;index++)
  {
    var columnas=[]
    for(let jdex=0;jdex<=alfabeto.length;jdex++)
    {
      if(index == 0 && jdex == 0)
        columnas.push('n')
      else
      {
        if(index == 0)
          columnas.push(alfabeto[jdex-1])
        if(jdex == 0)
          columnas.push(estados[index-1])
      }
      if(index != 0 && jdex != 0)
        { 
          var paso=0
          for(let i=0;i<Ftrans.length;i++)
          {  
            if(Ftrans[i][0] == columnas[0] && Ftrans[i][1] == matriz[0][jdex])
            {
              if(columnas[jdex]==null)
                columnas.push(Ftrans[i][2])
              else
                columnas[jdex]=columnas[jdex]+","+Ftrans[i][2]
              paso=1
            }
          }
          if(paso==0)
            columnas.push("-")
        }
    }
    matriz.push(columnas)
  }
  return matriz
}
    

// Funciones para simplificar afd

/* function Compatibles() */

function factorial(numero)
{
  var resultado=1
  while(numero>0)
  {
    resultado*=numero
    numero--
  }
  return resultado
}

function coef_binomial(numero)
{
  var resultado=factorial(numero)/(factorial(2)*factorial(numero-2))
  return resultado
}

function matrizvacia(arreglo)
{
  var matriz=[]
  for(let index=0;index<=arreglo.length;index++)
  {
    var columnas=[]
    for(let jdex=0;jdex<=arreglo.length;jdex++)
    {
      if(index == 0 && jdex == 0)
        columnas.push('n')
      else
      {
        if(index == 0)
          columnas.push(arreglo[jdex-1])
        if(jdex == 0)
          columnas.push(arreglo[index-1])
         
      }
      if(index != 0 && jdex != 0)
      { 
        if(index==jdex)
          columnas.push(-1)
        else
          columnas.push(0)
      }
    }
    matriz.push(columnas)
  }
  return matriz
}

function matriz_distinguible(matriz,estados,alfa,estados_f)
{
  var matriz_resultado=matrizvacia(estados)
  var id_i=1,id_f=estados.length,iteracion=0

  while(iteracion<coef_binomial(estados.length))
  {
    while(id_i!=id_f)
    {
      if(final_nofinal(matriz[id_i][0],estados_f)!=final_nofinal(matriz[id_f][0],estados_f))
      {
        matriz_resultado[id_i][id_f]=1
        matriz_resultado[id_f][id_i]=1
      } 
      else
      {
        var aux=1
        while(aux<=alfa.length)
        {
          if(final_nofinal(matriz[id_i][aux],estados_f)!=final_nofinal(matriz[id_f][aux],estados_f))
          {
            matriz_resultado[id_i][id_f]=1
            matriz_resultado[id_f][id_i]=1
            aux=alfa.length
          }
          aux++
        }
      }
      id_f--
      iteracion++
    }
    id_i++
    id_f=estados.length
  }
  return matriz_resultado
}

function afnd_to_afd(matriz,estado_i,estado_f,conjuntoq,alfabeto,gama)
{
  estado_i+=estados3alfaconsumido(estado_i,gama)
  var nuevoQ=[]
  var nuevoG=[]
  var nuevoF=[]
  nuevoQ.push(estado_i)
  for(let i=0;i<nuevoQ.length;i++)
  {  
    for(let j=0;j<alfabeto.length;j++)
    {
      if(nuevoQ[i]!="S")
      {
        var estadoU=""
        var estadoaux=nuevoQ[i].split(",")
        for(let k=0;k<estadoaux.length;k++)
        {
          if(Cdirige(matriz,estadoaux[k],alfabeto[j])!="-")
          {
            if(estadoU!="")
              estadoU=estadoU+","+Cdirige(matriz,estadoaux[k],alfabeto[j])
            else
              estadoU+=Cdirige(matriz,estadoaux[k],alfabeto[j])
          }
        }
        if(estadoU!="")
        {
          estadoU=artostr(Datos_dupli(estadoU.split(",")))
          nuevoG.push(añadirtransicion(nuevoQ[i],alfabeto[j],estadoU))
          if(noexiste(estadoU,nuevoQ))
            nuevoQ.push(estadoU)
          if(existefinal(estadoU,estado_f))
            nuevoF.push(estadoU)
        }
        else
        {
          estadoU="S"
          nuevoG.push(añadirtransicion(nuevoQ[i],alfabeto[j],estadoU))
          if(noexiste(estadoU,nuevoQ))
            nuevoQ.push(estadoU)
        }
      }
      else
        nuevoG.push(añadirtransicion(nuevoQ[i],alfabeto[j],nuevoQ[i])) 
    }
  }
  if(existefinal(nuevoQ[0],estado_f))
    nuevoF.push(nuevoQ[0])
  var respuesta=[]
  nuevoF=Datos_dupli(nuevoF)
  respuesta.push(estado_i)
  respuesta.push(nuevoQ)
  respuesta.push(alfabeto)
  respuesta.push(nuevoG)
  respuesta.push(nuevoF)
  
  return respuesta
}

function final_nofinal(id,estadosf)
{
  if(estadosf.includes(id))  // true = final
    return true
  else                      //false = nofinal
    return false
}

function buscar_disti(matriz)
{
  var ids=[]
  for(let index=1;index<matriz.length;index++)
    for(let jdex=1;jdex<matriz.length;jdex++)
      if(matriz[index][jdex]==0)
      {
        matriz[index][jdex]=1
        matriz[jdex][index]=1
        ids.push(matriz[0][index])
        ids.push(matriz[jdex][0])
        return ids
      }
}

function equivalencias(matriz)
{
  var ids=[]
  for(let index=1;index<matriz.length;index++)
    for(let jdex=1;jdex<matriz.length;jdex++)
      if(matriz[index][jdex]==0)
        return true
  return false
}

function EsAFD(estados,alfabeto,gama)
{
  for(let i=0;i<estados.length;i++)
  {
    var cont=0
    for(let j=0;j<gama.length;j++)
    {
      if(estados[i]==gama[j][0])
      {
        if(transicion_repetida(gama[j],gama,j))
          cont++
      }
      if(gama[j][1]=="$")
        return false
    }
    if(cont!=alfabeto.length)
      return false
  }
  return true
}

function transicion_repetida(transicion,gama,posicion)
{
  for(let i=0;i<gama.length;i++)
  {
    if(i!=posicion)
    {
      if(transicion[0]==gama[i][0] && transicion[1]==gama[i][1] && transicion[2]==gama[i][2])
        return false
    }
  }
  return true
}

function CompararArray(arr1,arr2)
{
  for(let i=0;i<arr1.length;i++)
  {
    if(!arr2.includes(arr1[i]))
      return false
  }
  return true
}
                  //estados - estados finales
function complemento(arreglo1,arreglo2)
{
 for(let i=0;i<arreglo1.length;i++)
 {
   if(arreglo2.includes(arreglo1[i]))
     arreglo2.splice(Buscar_id(arreglo2,arreglo1[i])-1,1)
   else
    arreglo2.push(arreglo1[i]) 
 }
}

function añadirtransicion(estado_e,alfa,estado_s)
{
  var conex=[]
  conex.push(estado_e)
  conex.push(alfa)
  conex.push(estado_s)
  return conex
}

function Cdirige(matriz,estado,alfa)
{
  for(let i=1;i<matriz.length;i++)
    for(let j=1;j<matriz[0].length;j++)
      if(matriz[i][0]==estado && matriz[0][j]==alfa)
        return matriz[i][j]
}

function soniguales(string1,string2)
{
  var str1=string1.split(",")
  var str2=string2.split(",")

  if(str1.length!=str2.length)
    return false
  for(let i=0;i<str1.length;i++)
    if(!str2.includes(str1[i]))
      return false
  return true
}

function existefinal(string,arreglo)
{
  var strr=string.split(",")
  for(let i=0;i<strr.length;i++)
    if(arreglo.includes(strr[i]))
      return true
  return false
}

function noexiste(estado,conjunto)
{
  var bitc=0
  for(let i=0;i<conjunto.length;i++)
    if(soniguales(conjunto[i],estado))
      bitc=1
  if(bitc==1)
    return false
  else
    return true
}

function artostr(arreglo)
{
  var r=""
  for(let i=0;i<arreglo.length;i++)
  {
    if(i>0)
      r=r+","+arreglo[i]
    else
      r+=arreglo[i]
  }
  return r
}
function compararalfabeto(arr1,arr2)
{
  if(comparararreglo(arr1,arr2) && comparararreglo(arr2,arr1))
    return true
  else
    return false
}
function comparararreglo(arr1,arr2)
{
  for(let i=0;i<arr1.length;i++)
  {
    if(!existealfa(arr1[i],arr2))
      return false
  }
  return true
}

function existealfa(string,arreglo)
{
  var strr=string.split("")
  for(let i=0;i<strr.length;i++)
    if(!arreglo.includes(strr[i]))
      return false
  return true
}

</script>
@endsection