<!-- #include file=conexion.asp -->
<!DOCTYPE html>
<meta charset="UTF-8"/>
<html>
<head>
	<title>Ejemplo Listado Vuelos por Compa&ntilde;&iacute;a</title>
	
  <script type="text/javascript">

	// FUNCIONES JAVASCRIPT
	
	// Creamos el objeto AJAX httprequest

    function AJAXCrearObjeto(){
    
       var obj;
     
       if (window.XMLHttpRequest) { // no es IE
      
          obj = new XMLHttpRequest();
	//alert('El navegador no es IE');
      } 
      
      else { // Es IE o no tiene el objeto
      
         try {
         
           obj = new ActiveXObject("Microsoft.XMLHTTP");
	   // alert('El navegador utilizado es IE');
         }
         catch (e) {
           
           // alert('El navegador utilizado no está soportado');
          }
      }

      //alert('realizado');
      return obj;
   }


   // Recibe y muestra los vuelos que pertenecen a la compania seleccionada

   function leerDatos(){
		
	
     // Comprobamos que se han recibido los datos
     
     if (oXML.readyState == 4) {
		

        // Accedemos al XML recibido

        var xml = oXML.responseXML.documentElement;
		
		
        // Accedemos al componente html correspondiente a la tabla

        var tabla = document.getElementById('tabla_vuelos');
        
        // Vaciamos el DIV
	  var definicion_tabla = new String("");

        // cadena con los datos para crear la tabla

     definicion_tabla ='<h2>Vuelos</h2><tr><td><b>IDVUELO</b></td><td><b>CIUDAD_ORIGEN</b></td><td><b>CIUDAD_DESTINO</b></td><td><b>FECHA</b></td><td><b>COMPANIA</b></td><td><b>AVION</b></td><td><b>PRECIO</b><td><b>DURACION</b></td></tr>';
          


         // Iteramos cada vuelo

          var v;
	      var item;


for (i = 0; i < xml.getElementsByTagName('vuelo').length; i++){
	    
             // Accedemos al objeto XML 

             item = xml.getElementsByTagName('vuelo')[i];


           

 	        // Recuperamos el identificador de vuelo

                 v = item.getElementsByTagName('idvuelo')[0].firstChild.data;
 	             
				 
				 // Añadimos el campo a la tabla
				 
				 definicion_tabla =definicion_tabla+'<td>'+ v +'</td>';        
                     


           // Recuperamos el id de la ciudad de origen

            v = item.getElementsByTagName('ciudad_origen')[0].firstChild.data;

           // Añadimos el campo a la tabla

            definicion_tabla =definicion_tabla+'<td>'+ v +'</td>';


           // Recuperamos el id de la ciudad destino

            v = item.getElementsByTagName('ciudad_destino')[0].firstChild.data;

           // Añadimos el campo a la tabla

            definicion_tabla= definicion_tabla+'<td>' + v +'</td>';

	    // Recuperamos la fecha

            v = item.getElementsByTagName('fecha')[0].firstChild.data;

           // Añadimos el campo a la tabla

            definicion_tabla= definicion_tabla+'<td>' + v + '</td>';


           // Recuperamos la compania

            v = item.getElementsByTagName('compania')[0].firstChild.data;

           // Añadimos el campo a la tabla

            definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

             // Recuperamos el id de avion

            v = item.getElementsByTagName('avion')[0].firstChild.data;

           // añadimo el campo a la tabla

            definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

             // Recuperamos el precio

            v = item.getElementsByTagName('precio')[0].firstChild.data;

           // añadimo el campo a la tabla

            definicion_tabla= definicion_tabla+'<td>' + v + '</td>';

            // Recuperamos la duracion del vuelo

            v = item.getElementsByTagName('duracion')[0].firstChild.data;

           // Añadimos el campo a la tabla

            definicion_tabla= definicion_tabla+'<td>' + v + '</td></tr>';
	          
                      
	
        }
        // rellenamos el objeto html tabla con la definicion construida

        tabla.innerHTML = definicion_tabla;
         
      }
       

  }

  function mostrar_destinos(){
	// recupera el objeto html desplegable de vuelos
	var valorx=document.getElementById("listar").value;
	// crea el objeto httprequest
	objeto = AJAXCrearObjeto();
	objeto.open('POST', 'lista_destinos.asp');
	objeto.onreadystatechange = listar_destinos;
	objeto.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// lanza la peticion enviando los parametros
	objeto.send("listar="+valorx );
  }

  function listar_destinos(){
	// Comprobamos que se han recibido los datos
	if (objeto.readyState == 4) {

		if(objeto.responseXML!=null){
		
	// Accedemos al XML recibido
	var xml = objeto.responseXML.documentElement;
	// Accedemos al componente html correspondiente a la tabla
	var lista = document.getElementById('destinos');
	// Vaciamos el DIV
	var definicion_lista = new String("")
	// cadena con los datos para crear la tabla
	definicion_lista='<option value="-"> CUALQUIERA  </option>'
	// Iteramos cada vuelo
	var v;
	var item;
	for (i = 0; i < xml.getElementsByTagName("vuelo").length; i++){

		// Accedemos al objeto XML
		item = xml.getElementsByTagName("vuelo")[i];

		// Recuperamos el id de la ciudad destino
		v = item.getElementsByTagName("ciudad_destino")[0].firstChild.data;

		// Añadimos el campo a la tabla

		definicion_lista=definicion_lista+'<option value="'+ v +'">'+ v +'</option>';

		}
	// rellenamos el objeto html tabla con la definicion construida
	lista.innerHTML = definicion_lista;
	}else{//Cuando responseXML es null indicamos que no hay vuelos y hacemos desaparecer la lista de vuelos anteriormente buscados
		   var lista = document.getElementById('destinos');
		   var definicion_lista = new String("")
		   definicion_lista='<option value="-">-NO HAY VUELOS-</option>'
		   var tabla = document.getElementById('tabla_vuelos');
			var definicion_tabla = new String("");
		   lista.innerHTML = definicion_lista;
		   tabla.innerHTML=definicion_tabla;
			}
	}
}
	
	
	function mostrar_vuelos(){
	
	
	// recupera el objeto html desplegable de listar

	 
	 var valorx=document.getElementById("listar").value;
    var valory=document.getElementById("destinos").value;
	 

     // crea el objeto httprequest 

     oXML = AJAXCrearObjeto();
     oXML.open('POST', 'consulta_datos.asp');
     oXML.onreadystatechange = leerDatos;

     oXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     // lanza la peticion enviando los parametros 

     oXML.send("listar="+valorx + "&destinos="+valory);
	} 
    
   </script>	
	
</head>

<body>
<h2>EJEMPLO LISTAR VUELOS POR COMPA&Ntilde;&Iacute;A</h2>

Seleccione una Compa&ntilde;&iacute;a de Vuelo: 
<select name="listar" id="listar" onChange="return mostrar_destinos()">
	
<%
Set origen = Conexion.Execute("select * from LISTA_VUELOS_PRECIO")
	'Recorreremos el RecordSet
	do while not origen.EOF
			Response.Write("<option value='" & origen("CIUDAD_ORIGEN") & "'>" & origen("CIUDAD_DESTINO") &"</option>")
			'Nos desplazamos por el RecordSet
			origen.MoveNext
	loop
%>
</select>
<select name='destinos' id='destinos' onChange="return mostrar_vuelos()">

</select>

<br><br>

<table id="tabla_vuelos" name="tabla_vuelos" border=1> 
     </table>

</body>
</html>