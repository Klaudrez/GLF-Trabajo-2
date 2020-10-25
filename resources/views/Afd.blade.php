<html>
<head>
    <!-- <script type="text/javascript" src="vis/disc">
    
    </script> -->
</head>
<body>
            
</body>
</html> 
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
        
</script>
<div id="mynetwork"></div>

<!-- <form method="post" action="#"> -->

<!-- Ingreso de datos automata n°1 visual -->
<table border="0">  
<caption>Automata N°1</caption>
<tr>
<td width="25%">Conjunto de estados Q:</td>
<td width="70%"><input type="text" name="conjuntoQ" placeholder="q1,q2,q3,...,qn" id="Q" > Formato: estado1,estado2,estado3, </td><br>
</tr>
<tr>
<td width="25%">Alfabeto:</td>
<td width="70%"><input type="text" name="Alfabeto" placeholder="a,b,c,d,..." id="Alfabeto" > Formato: letra/num, </td><br>
</tr>
<tr>
<td width="25%">Estado inicial:</td>
<td width="70%"><input type="text" name="Inicial" placeholder="q" id="Inicial" > Formato: estado, </td><br>
</tr>
<tr>
<td width="25%">Función de transición:</td>
<td width="70%"><input type="text" name="Gama" placeholder="q,a,q;" id="Gama" > Formato: estadoentrada,alfabeto,estadosalida; </td><br>
<tr>
<td width="25%">Estado(s) final(es):</td>
<td width="70%"><input type="text" name="Finales" placeholder="q1,q2,q3,q4,..." id="Finales" > Formato: estado,estado </td><br>
</tr>
</table>
<button onclick="ValidarEntrada()">Ingresar automata </button>



<!-- Fin entrada de datos automata n°1 -->


<script type="text/javascript">

var E_inicial
var ConjuntoQ=[]
var Alfabeto=[]
var Gama=[]
var E_Finales=[]
var node,edge,data,container,options,network

function ValidarEntrada()
{
    E_inicial=document.getElementById("Inicial").value
    var Q=document.getElementById("Q").value
    var A=document.getElementById("Alfabeto").value
    var G=document.getElementById("Gama").value
    var F=document.getElementById("Finales").value

    let val=/^([a-zA-Z|0-9]+[,]?)+[a-zA-Z0-9]/g
    let valg=/^(([a-zA-Z0-9]+[,]?)+[;]?)+[a-zA-Z0-9]/g

    if(Q.length == 0 || A.length == 0 || G.length == 0 || E_inicial.length == 0 || F.length == 0)
        alert("Hay campos en blanco")
    else
    {
       /*  if(val.test(Q) && val.test(A) && valg.test(G))
        {
             Local_ConjuntoQ=Q.split(',')
            Local_Alfabeto=A.split(',')
            var preasig=G.split(';')
            for(let index=0;index<preasig.length;index++)
                Local_Gama.push(preasig[index].split(',')) 
        }
        else
        alert("Formato ingresado no valido") */
        
        ConjuntoQ=Datos_dupli(Q.split(','))
        ConjuntoQ.splice(0,0,E_inicial)
        ConjuntoQ=Datos_dupli(ConjuntoQ)
        Alfabeto=Datos_dupli(A.split(','))
        E_Finales=Datos_dupli(F.split(','))
        Gama=_Gama(Datos_dupli(G.split(';')))
    }
    console.log(ConjuntoQ)
    console.log(Alfabeto)
    console.log(Gama)
    console.log(E_Finales)
    console.log(tabla_estados(ConjuntoQ,Alfabeto,Gama))
    graph()

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
  arreglo.forEach(element => {object.push({from: Buscar_id(ConjuntoQ,element[0]), to: Buscar_id(ConjuntoQ,element[2]), label: element[1]})})
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

function graph()
{
  node=new vis.DataSet(visestado(ConjuntoQ))
  edge=new vis.DataSet(alfabetoxestado(Gama))
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
          for(let i=0;i<Ftrans.length;i++)
            if(Ftrans[i][0] == columnas[0] && Ftrans[i][1] == matriz[0][jdex])
              columnas.push(Ftrans[i][2])
        }

    }
    matriz.push(columnas)
  }
  return matriz
}

</script>
</body>
</html>