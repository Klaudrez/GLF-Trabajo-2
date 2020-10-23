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
<td width="25%">Función de transición:</td>
<td width="70%"><input type="text" name="Gama" placeholder="q,a,q;" id="Gama" > Formato: estadoentrada,alfabeto,estadosalida; </td><br>
</table>
<button onclick="ValidarEntrada()">Ingresar automata </button>



<!-- Fin entrada de datos automata n°1 -->


<script type="text/javascript">

var Local_ConjuntoQ=[]
var Local_Alfabeto=[]
var Local_Gama=[]
var node,edge,data,container,options,network

function ValidarEntrada()
{
    var Q=document.getElementById("Q").value
    var A=document.getElementById("Alfabeto").value
    var G=document.getElementById("Gama").value

    let val=/^([a-zA-Z|0-9]+[,]?)+[a-zA-Z0-9]/g
    let valg=/^(([a-zA-Z0-9]+[,]?)+[;]?)+[a-zA-Z0-9]/g

    if(Q.length == 0 || A.length == 0 || G.length == 0)
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
        Local_ConjuntoQ=Q.split(',')
        Local_Alfabeto=A.split(',')
        var preasig=G.split(';')
        for(let index=0;index<preasig.length;index++)
            Local_Gama.push(preasig[index].split(','))
        
    }
    console.log(Local_ConjuntoQ)
    console.log(Local_Alfabeto)
    console.log(Local_Gama)
    graph()

}

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
  arreglo.forEach(element => {object.push({from: Buscar_id(Local_ConjuntoQ,element[0]), to: Buscar_id(Local_ConjuntoQ,element[2]), label: element[1]})})
  return object
}

function Buscar_id(arreglo, nombre)
{
  for(let index=0;index<arreglo.length;index++)
  {
    if(nombre==arreglo[index])
      return index+1
  }
    
}

function graph()
{
  console.log(alfabetoxestado(Local_Gama))
  console.log(visestado(Local_ConjuntoQ))
  node=new vis.DataSet(visestado(Local_ConjuntoQ))
  edge=new vis.DataSet(alfabetoxestado(Local_Gama))
  container= document.getElementById('mynetwork')
  data={nodes: node, edges: edge}
  options={edges:{arrows:{to:{enabled:true}}}}
  network= new vis.Network(container, data, options)
}



</script>
</body>
</html>