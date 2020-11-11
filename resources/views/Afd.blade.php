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
<caption>Datos Automatas</caption>
<tr>
<td width="25%">Conjunto de estados Q:</td>
<td width="70%"><input type="text" name="conjuntoQ" placeholder="q1,q2,q3,...,qn" id="Q" > Formato: estado1,estado2,estado3, </td>
</tr>
<tr>
<td width="25%">Alfabeto:</td>
<td width="70%"><input type="text" name="Alfabeto" placeholder="a,b,c,d,..." id="Alfabeto" > Formato: letra/num, </td>
</tr>
<tr>
<td width="25%">Estado inicial:</td>
<td width="70%"><input type="text" name="Inicial" placeholder="q" id="Inicial" > Formato: estado, </td>
</tr>
<tr>
<td width="25%">Función de transición:</td>
<td width="70%"><input type="text" name="Gama" placeholder="q,a,q;" id="Gama" > Formato: estadoentrada,alfabeto,estadosalida; </td>
<tr>
<td width="25%">Estado(s) final(es):</td>
<td width="70%"><input type="text" name="Finales" placeholder="q1,q2,q3,q4,..." id="Finales" > Formato: estado,estado </td><br>
</tr>
</table>
<button onclick="ValidarEntrada1()">Ingresar automata 1</button>
<button onclick="ValidarEntrada2()">Ingresar automata 2</button>
<button onclick="simplificar1()">Simplificar automata1 </button>
<button onclick="simplificar2()">Simplificar automata2 </button>

<table border="0">  
<caption>Funciones para ambos automatas</caption> 
<td>
<button onclick="Complemento()">Complemento</button>
<button onclick="Union()">Union</button>
<button onclick="Concatenar()">Concatenacion</button>
<button onclick="Interseccion()">Interseccion</button>
</td>
</table>


<!-- Fin entrada de datos automata n°1 -->


<script type="text/javascript">

var E_inicial1="",E_inicial2="",E_inicial3

var ConjuntoQ1=[],ConjuntoQ2=[],ConjuntoQ3=[]

var Alfabeto1=[],Alfabeto2=[],Alfabeto3=[]

var Gama1=[],Gama2=[],Gama3=[]

var E_Finales1=[],E_Finales2=[],E_Finales3=[]

var node,edge,data,container,options,network


function ValidarEntrada1()
{
    limpiar()

    if(ConjuntoQ1.length>0)
      ResetearAutomata(ConjuntoQ1,Alfabeto1,Gama1,E_inicial1,E_Finales1)

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
          E_inicial1=comparar_eini(E_inicial1,E_inicial2) 
          ConjuntoQ1=Datos_dupli(Q.split(','))
          if(validar_estadosx(ConjuntoQ1,E_inicial1))
          {  
            ConjuntoQ1.splice(0,0,E_inicial1)
            ConjuntoQ1=cambiarcaracter(ConjuntoQ2,ConjuntoQ1)
            ConjuntoQ1=Datos_dupli(ConjuntoQ1)
        
            Alfabeto1=Datos_dupli(A.split(','))

            E_Finales1=Datos_dupli(F.split(','))
            E_Finales1=cambiarcaracter(E_Finales2,E_Finales1)

            Gama1=_Gama(Datos_dupli(G.split(';')))
            Gama1=cambiarcaractergama(ConjuntoQ2,Gama1)
            Gama1=epsilon(Gama1)  
           
            if(validar_estadosx(ConjuntoQ1,E_Finales1) && validar_gama(ConjuntoQ1,Alfabeto1,Gama1))
            {
              ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
              Gama3=copiararray(Gama1,Gama2)
              Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
              E_Finales3=copiararray(E_Finales1,E_Finales2) 
              console.log("Estados A1: ",ConjuntoQ1)
              console.log("Alfabeto A1: ",Alfabeto1)
              console.log("Transiciones A1: ",Gama1)
              console.log("Estados finales A1: ",E_Finales1)
              console.log("Estado inicial A1: ",E_inicial1)

              console.log("Tabla de estados A1: ",tabla_estados(ConjuntoQ1,Alfabeto1,Gama1)) 
              graph()
            }
            else
              alert("Lo datos ingresados no validos, deben estar contenidos en el alfabeto o en los estados")
          }
          else
            alert("Lo datos ingresados no validos, el estado inicial debe estar contenido en el conjunto de estados")
        }
        else
          alert("Formato ingresado no valido") 
    }
}

function ValidarEntrada2()
{
    limpiar()
    if(ConjuntoQ2.length>0)
      ResetearAutomata(ConjuntoQ2,Alfabeto2,Gama2,E_inicial2,E_Finales2)

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
          E_inicial2=comparar_eini(E_inicial2,E_inicial1) 
          ConjuntoQ2=Datos_dupli(Q.split(','))

          if(validar_estadosx(ConjuntoQ2,E_inicial2))
          {
            ConjuntoQ2.splice(0,0,E_inicial2)
            ConjuntoQ2=cambiarcaracter(ConjuntoQ1,ConjuntoQ2)
            ConjuntoQ2=Datos_dupli(ConjuntoQ2)
          
            Alfabeto2=Datos_dupli(A.split(','))

            E_Finales2=Datos_dupli(F.split(','))
            E_Finales2=cambiarcaracter(E_Finales1,E_Finales2)

            Gama2=_Gama(Datos_dupli(G.split(';')))
            Gama2=cambiarcaractergama(ConjuntoQ1,Gama2)
            Gama2=epsilon(Gama2)

            if(validar_estadosx(ConjuntoQ2,E_Finales2) && validar_gama(ConjuntoQ2,Alfabeto2,Gama2))
            {
              ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
              Gama3=copiararray(Gama1,Gama2)
              Alfabeto3=copiararray(Alfabeto1,Alfabeto2)
              E_Finales3=copiararray(E_Finales1,E_Finales2)

              console.log("Estados A2: ",ConjuntoQ2)
              console.log("Alfabeto A2: ",Alfabeto2)
              console.log("Transiciones A2: ",Gama2)
              console.log("Estados finales A2: ",E_Finales2)
              console.log("Estado inicial A2: ",E_inicial2)

              console.log("Tabla de estados A2: ",tabla_estados(ConjuntoQ2,Alfabeto2,Gama2))
              graph()
            }
            else
              alert("Lo datos ingresados no validos, deben estar contenidos en el alfabeto o en los estados")
          }
          else
            alert("Lo datos ingresados no validos, el estado inicial debe estar contenido en el conjunto de estados")
        }
        else
          alert("Formato ingresado no valido") 
    }  
}

function ResetearAutomata(estados,alfabeto,gama,e_inicial,e_finales)
{
  estados=estados.splice(0,estados.length)
  alfabeto=alfabeto.splice(0,alfabeto.length)
  gama=gama.splice(0,gama.length)
  e_inicial=null
  e_finales=e_finales.splice(0,e_finales.length)
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
    if(!comparador2.includes(a_comparar[i][1]))
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

function simplificar1()
{
  limpiar()
  if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1))
    optimizar(ConjuntoQ1,ConjuntoQ2,Alfabeto1,Gama1,Gama2,E_Finales1)
  else
    alert("no es afd")
}

function simplificar2()
{
  limpiar()
  if(EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
    optimizar(ConjuntoQ2,ConjuntoQ1,Alfabeto2,Gama2,Gama1,E_Finales2)
  else
    alert("no es afd")
}

function Complemento()
{
  limpiar()
  if(EsAFD(ConjuntoQ1,Alfabeto1,Gama1) && EsAFD(ConjuntoQ2,Alfabeto2,Gama2))
  {
    complemento(ConjuntoQ1,E_Finales1)
    complemento(ConjuntoQ2,E_Finales2)

    console.log("Estados A1: ",ConjuntoQ1)
    console.log("Alfabeto A1: ",Alfabeto1)
    console.log("Transiciones A1: ",Gama1)
    console.log("Estados finales A1: ",E_Finales1)
    console.log("Estado inicial A1: ",E_inicial1)

    console.log("Estados A2: ",ConjuntoQ2)
    console.log("Alfabeto A2: ",Alfabeto2)
    console.log("Transiciones A2: ",Gama2)
    console.log("Estados finales A2: ",E_Finales2)
    console.log("Estado inicial A2: ",E_inicial2)

    E_Finales3=copiararray(E_Finales1,E_Finales2)

    graph()
  }
}

function Union()
{
  limpiar()
  if(ConjuntoQ1.length>0 && ConjuntoQ2.length>0)
  {
    console.log("Estados A1: ",ConjuntoQ1)
    console.log("Alfabeto A1: ",Alfabeto1)
    console.log("Transiciones A1: ",Gama1)
    console.log("Estados A2: ",ConjuntoQ2)
    console.log("Alfabeto A2: ",Alfabeto2)
    console.log("Transiciones A2: ",Gama2)
    var inicio1=ConjuntoQ1[0]
    var inicio2=ConjuntoQ2[0]
    E_inicial3="X"
    ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
    ConjuntoQ3.splice(0,0,E_inicial3)
    Gama3=copiararray(Gama1,Gama2)
    
    Gama3.splice(0,0,conexionu(inicio1))
    Gama3.splice(0,0,conexionu(inicio2))

    Gama3=epsilon(Gama3)

    console.log("Estados U: ",ConjuntoQ3)
    console.log("Alfabeto U: ",Alfabeto3)
    console.log("Transiciones U: ",Gama3)
    console.log("Estados finales U: ",E_Finales3)
    console.log("Estado inicial U: ",E_inicial3)
    graph()
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
    console.log("Estados A1: ",ConjuntoQ1)
    console.log("Alfabeto A1: ",Alfabeto1)
    console.log("Transiciones A1: ",Gama1)
    console.log("Estados finales A1: ",E_Finales1)
    console.log("Estado inicial A1: ",E_inicial1)
    console.log("Estados A2: ",ConjuntoQ2)
    console.log("Alfabeto A2: ",Alfabeto2)
    console.log("Transiciones A2: ",Gama2)
    console.log("Estados finales A2: ",E_Finales2)
    console.log("Estado inicial A2: ",E_inicial2)

    ConjuntoQ3=copiararray(ConjuntoQ1,ConjuntoQ2)
    Gama3=copiararray(Gama1,Gama2)

    E_inicial3=E_inicial1

    for(let i=0;i<=E_Finales1.length;i++)
    {
      i=0
      Gama3.splice(0,0,concatenarconexion(E_Finales1[i],E_inicial2))
      E_Finales1.splice(i,1) 
      E_Finales3.splice(i,1)
    }
    Gama3=epsilon(Gama3)

    
    console.log("Estados A1 c A2: ",ConjuntoQ3)
    console.log("Alfabeto A1 c A2: ",Alfabeto3)
    console.log("Transiciones A1 c A2: ",Gama3)
    console.log("Estados finales A1 c A2: ",E_Finales3)
    console.log("Estado inicial A1 c A2: ",E_inicial3)

    graph()
  }
  else
    alert("Debe ingresar ambos automatas")
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

function comparar_eini(estado1,estado2)
{
  if(estado1!="" && estado2!="")
  {
    if(caractervalido(estado1) && caractervalido(estado2))
    {
      if(estado1==estado2)
      {
        if(estado2[0].charCodeAt()==57 || estado2[0].charCodeAt()==90 || estado2[0].charCodeAt()==122)
          estado2=estado2.replace(estado2[0],String.fromCharCode(estado2[0].charCodeAt()-1))
        else
          estado2=estado2.replace(estado2[0],String.fromCharCode(estado2[0].charCodeAt()+1))
      }
    }
    return estado2
  }
  return estado1

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

function cambiarcaracter(dato1,dato2)
{
  for(let j=0;j<dato1.length;j++)
    for(let x=0;x<dato2.length;x++)
    {
  	  dato2[x]=compararletra(dato1[j],dato2[x])
    }
  return dato2
}

function cambiarcaractergama(g1,g2)
{
  for(let i=0;i<g1.length;i++)
    for(let j=0;j<g2.length;j++)
    {
      if(g1[i]==g2[j][0])
        g2[j][0]=compararletra(g1[i],g2[j][0])
      if(g1[i]==g2[j][2])
        g2[j][2]=compararletra(g1[i],g2[j][2])
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
    	if(palabra2[0].charCodeAt()==57 || palabra2[0].charCodeAt()==90 || palabra2[0].charCodeAt()==122)
      	palabra2=palabra2.replace(palabra2[0],String.fromCharCode(palabra2[0].charCodeAt()-1))
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

function gama_dupli(arreglo)
{
  for(let index=0;index<arreglo.length;index++)
	  for(let jdex=0;jdex<arreglo.length;jdex++)
	  {
      if(index!=jdex)
      {
        if(Comparar(arreglo[index],arreglo[jdex]))
        {  
          arreglo.splice(jdex,1)
          jdex=0
        }
      }
	  }
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
                columnas[jdex]+=Ftrans[i][2]
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

/* function transiciones_e(estados,gama)
{
  var resultado=[]
  for(let i=0;i<estados.length;i++)
    for(let j=0;j<gama.length;j++)
      if(estados[i]==gama[j][0]&&gama[j][1]=="$")
      {
        var pos=[]
        pos.push(gama[j][0])
        pos.push(gama[j][2])
        resultado.push(pos)
      }
  return resultado
}     

function TieneE(estado,estados_e)
{
  for(let i=0;i<estados_e.length;i++)
    if()
} */
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

function afnd_to_afd(estados,alfabeto,gama)
{

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
                  //estados - estados finales
function complemento(arreglo1,arreglo2)
{
  for(let index=0;index<arreglo1.length;index++)
  {
    if(!arreglo2.includes(arreglo1[index]))
      arreglo2.push(arreglo1[index])
    else
      arreglo2.splice(arreglo1[index],1)
  }
}
                          //ConjuntoQ,Gama
/* function simplificar(matriz,arreglo1,arreglo2)
{
  var matriz_d=matriz_distinguible(matriz,arreglo1,arreglo2)
  var id_d=buscar_disti(matriz_d)
  
  for(let index=0;index<arreglo2.length;index++)
  {
    if(arreglo2[index][0]==arreglo1[id_d[1]])
      arreglo2.splice(index,1)
    if(arreglo2[index][2]==arreglo1[id_d[1]])
    {
      var aux=[]
      aux.push(arreglo2[index][0])
      aux.push(arreglo2[index][1])
      aux.push(arreglo1[id_d[1]])

      arreglo2.splice(index,1,aux)
    }
  }
  arreglo1.splice(id_d[1],1)
} */

</script>
</body>
</html>