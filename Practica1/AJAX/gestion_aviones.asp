<!-- #include FILE="conexion.asp" -->
<!-- #include FILE="seguridad.asp" -->

<!DOCTYPE html>
<html>

<head>
	<style>
		img {
			background: none;
			float: right;
		}

		a {
			float: right;
			text-decoration: none;
		}

		#jsp {
			margin-right: 50px;
			margin-top: 25px;
		}

		.add {
			float: left;
		}

		td {
			text-align: center;
		}
	</style>
</head>

<body>
	<a href="http://localhost:8080/prueba/modificarAviones.jsp" id="jsp">MODIFICAR JSP</a>
	<h1>AVIONES</h1>
	<table border=1>
		<tr>
			<th>ID AVI&Oacute;N</th>
			<th>AVI&Oacute;N</th>
			<th>N&ordm; Plazas</th>
			<th>Precio Base</th>
			<th>Modificar</th>
			<th>Eliminar</th>
			<th>Detalles</th>
		</tr>
		<% Set datos=Conexion.Execute("select * from AVION") do while not datos.Eof Response.Write("<tr>
			<td>"& datos("IDAVION")&"</td>
			<td>"& datos("AVION")&"</td>
			<td>"& datos("N_PLAZAS")&"</td>
			<td>"& datos("PRECIO_BASE")&"</td>
			<td><a href="&" modificar_aviones.asp?id="& datos(" IDAVION") &"><img src="&" imagenes/lapiz.png"&"
						alt=" & " lapiz" &"width=" & " 20px"&" height="&" 20px" &" /></a></td>
			<td><a href="&" eliminar_avion.asp?id="& datos(" IDAVION")&"><img src="&" imagenes/papelera.png"&" alt=" & "
						papelera" &"width=" & " 25px"&" height="&" 25px" &" /></a></td>
			<td><a href="&" detalles_avion.asp?id="& datos(" IDAVION")&"><img src="&" imagenes/ojo.png"&" alt=" & " ojo"
						&"width=" & " 25px"&" height="&" 25px" &" /></a></td>
			</tr>")
			datos.MoveNext
			loop%>
	</table><br /><br />
	<a class="add" href="insertar_aviones.asp"><img src="imagenes/add.png" alt="add" width="25px"
			height="25px" />A&Ntilde;ADIR &nbsp;</a><br><br>
	<h1>VUELOS</h1>
	<input type="button" id="ins" value="INSETAR VUELO" onClick="return insertar()">
	<input type="button" id="con" value="CONSULTAR VUELO" onClick="return consultar()">
	<input type="button" id="mod" value="MODIFICAR VUELO" onClick="return modificar()">

	<div id="insertar"></div>
	<div id="modificar"></div>
	<div id="consultar"></div>

	<script type="text/javascript">

		function AJAXCrearObjeto() {
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



		//INSERTAR
		function insertar() {
			var sql = new String("");
			var sql = '<br><br><form ><label for="origen">IDCIUDADORIGEN:</label><br><input type="text" id="origen" name="origen"><br><br><label for="destino">IDCIUDADDESTINO:</label><br><input type="text" id="destino" name="destino"><br><br><label for="fecha">FECHA:</label><br><input type="date" id="fecha" name="fecha"><br><br><label for="compania">IDCOMPANIA:</label><br><input type="text" id="compania" name="compania"><br><br><label for="avion">AVION:</label><br><input type="text" name="avion" id="avion" ><br><br><label for="duracion">DURACION:</label><br><input type="number" name="duracion" id="duracion"><br><br><input type="button" value="Insertar Vuelo" onClick="enviarDatos()"></form>';
			var detalles = document.getElementById('insertar');
			detalles.innerHTML = sql;
		}

		function insertado() {
			if (objeto.readyState == 4) {
				var detalles = document.getElementById('insertar');
				var msg = new String("");
				var msg = '<br><br><h3>VUELO INSERTADO</h3>'
				detalles.innerHTML = msg;

			}
		}

		function enviarDatos() {

			var identificador = "1";
			var origen = document.getElementById("origen").value;
			var destino = document.getElementById("destino").value;
			var fecha = document.getElementById("fecha").value;
			var compania = document.getElementById("compania").value;
			var avion = document.getElementById("avion").value;
			var duracion = document.getElementById("duracion").value;


			objeto = AJAXCrearObjeto();
			objeto.open('GET', 'mostrar_vuelos.asp?origen=' + origen + '&destino=' + destino + '&fecha=' + fecha + '&compania=' + compania + '&avion=' + avion + '&duracion=' + duracion + '&identificador=' + identificador, true);
			objeto.onreadystatechange = insertado;
			objeto.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			objeto.send();

		}



		//MODIFICAR
		function modificar() {
			var sql2 = new String("");
			var sql2 = '<br><br><form ><label for="MODY">IDVUELO:</label><br><input type="text" id="mody" name="mody"><br><br><input type="button" value="Buscar" onClick="enviarid()"></form>';
			var detalles2 = document.getElementById('modificar');
			detalles2.innerHTML = sql2;
		}

		function enviarid() {

			var identificador = "2";
			var idvuelo = document.getElementById("mody").value;


			objeto = AJAXCrearObjeto();
			objeto.open('GET', 'mostrar_vuelos.asp?idvuelo=' + idvuelo + '&identificador=' + identificador, true);
			objeto.onreadystatechange = completarDatos;
			objeto.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			objeto.send();

		}

		function formato(FECHA) {
			const date = FECHA;

			const [day, month, year] = date.split('/');

			const result = [year, month, day].join('-');

			return result;
		}

		function completarDatos() {


			if (objeto.readyState == 4) {

				var xml = objeto.responseXML.documentElement;

				var datos = document.getElementById('modificar');

				var definicion_datos = new String("");
				var item;
				for (i = 0; i < xml.getElementsByTagName("vuelo").length; i++) {

					item = xml.getElementsByTagName("vuelo")[i];
					var idvuelo = item.getElementsByTagName("idvuelo")[0].firstChild.data;
					var origen = item.getElementsByTagName("ciudad_origen")[0].firstChild.data;
					var destino = item.getElementsByTagName("ciudad_destino")[0].firstChild.data;
					var fecha = item.getElementsByTagName("fecha")[0].firstChild.data;
					fecha = formato(fecha);
					var compania = item.getElementsByTagName("compania")[0].firstChild.data;
					var avion = item.getElementsByTagName("avion")[0].firstChild.data;
					var duracion = item.getElementsByTagName("duracion")[0].firstChild.data;


					definicion_datos = '</br><br><form ><label for="MODY">IDVUELO:</label></br><input type="text" id="idvuelo" value="' + idvuelo + '" readonly></br><label for="origen">IDCIUDADORIGEN:</label><br><input type="text" id="origen" value="' + origen + '"><br><br><label for="destino">IDCIUDADDESTINO:</label><br><input type="text" id="destino" value="' + destino + '"><br><br><label for="fecha">FECHA:</label><br><input type="date" id="fecha" value="' + fecha + '"><br><br><label for="compania">IDCOMPANIA:</label><br><input type="text" id="compania" value="' + compania + '"><br><br><label for="avion">AVION:</label><br><input type="text" value="' + avion + '" id="avion" ><br><br><label for="duracion">DURACION:</label><br><input type="number" value="' + duracion + '" id="duracion"><br><br><input type="button" value="Modificar Vuelo" onClick="enviarDatosmodificados()"></form>';
				}

				datos.innerHTML = definicion_datos;

			}
		}

		function enviarDatosmodificados() {
			// recupera el objeto html desplegable de vuelos
			var identificador = "3";
			var idvuelo = document.getElementById("idvuelo").value;
			var origen = document.getElementById("origen").value;
			var destino = document.getElementById("destino").value;
			var fecha = document.getElementById("fecha").value;
			var compania = document.getElementById("compania").value;
			var avion = document.getElementById("avion").value;
			var duracion = document.getElementById("duracion").value;


			objeto = AJAXCrearObjeto();
			objeto.open('GET', 'mostrar_vuelos.asp?idvuelo=' + idvuelo + '&origen=' + origen + '&destino=' + destino + '&fecha=' + fecha + '&compania=' + compania + '&avion=' + avion + '&duracion=' + duracion + '&identificador=' + identificador, true);
			objeto.onreadystatechange = modificado;
			objeto.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			objeto.send();

		}


		function modificado() {
			if (objeto.readyState == 4) {
				var detalles = document.getElementById('modificar');
				var msg = new String("");
				var msg = '<br><br><h3>VUELO MODIFICADO</h3>'
				detalles.innerHTML = msg;

			}
		}

		//CONSULTAR

		function consultar() {
			var sql2 = new String("");
			var sql2 = '<br><br><form ><label for="MODY">IDVUELO:</label><br><input type="text" id="mody" name="mody"><br><br><input type="button" value="Buscar" onClick="enviarid2()"></form>';
			var detalles2 = document.getElementById('consultar');
			detalles2.innerHTML = sql2;
		}

		function enviarid2() {

			var identificador = "4";
			var idvuelo = document.getElementById("mody").value;


			objeto = AJAXCrearObjeto();
			objeto.open('GET', 'mostrar_vuelos.asp?idvuelo=' + idvuelo + '&identificador=' + identificador, true);
			objeto.onreadystatechange = completarDatos2;
			objeto.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			objeto.send();

		}

		function completarDatos2() {

			if (objeto.readyState == 4) {

				var xml = objeto.responseXML.documentElement;

				var datos = document.getElementById('consultar');

				var definicion_datos = new String("");
				var item;
				for (i = 0; i < xml.getElementsByTagName("vuelo").length; i++) {

					item = xml.getElementsByTagName("vuelo")[i];
					var idvuelo = item.getElementsByTagName("idvuelo")[0].firstChild.data;
					var origen = item.getElementsByTagName("ciudad_origen")[0].firstChild.data;
					var destino = item.getElementsByTagName("ciudad_destino")[0].firstChild.data;
					var fecha = item.getElementsByTagName("fecha")[0].firstChild.data;
					fecha = formato(fecha);
					var compania = item.getElementsByTagName("compania")[0].firstChild.data;
					var avion = item.getElementsByTagName("avion")[0].firstChild.data;
					var duracion = item.getElementsByTagName("duracion")[0].firstChild.data;
					var plazas = item.getElementsByTagName("plazas")[0].firstChild.data;

					definicion_datos = '</br><br><form ><label for="MODY">IDVUELO:</label></br><input type="text" id="idvuelo" value="' + idvuelo + '" readonly></br><label for="origen">IDCIUDADORIGEN:</label><br><input type="text" id="origen" value="' + origen + '"readonly><br><br><label for="destino">IDCIUDADDESTINO:</label><br><input type="text" id="destino" value="' + destino + '"readonly><br><br><label for="fecha">FECHA:</label><br><input type="date" id="fecha" value="' + fecha + '"readonly><br><br><label for="compania">IDCOMPANIA:</label><br><input type="text" id="compania" value="' + compania + '"readonly><br><br><label for="avion">AVION:</label><br><input type="text" value="' + avion + '" id="avion" ><br><br><label for="duracion">DURACION:</label><br><input type="number" value="' + duracion + '" id="duracion"readonly><br><br><label for="plazas">PLAZAS DISPONIBLES:</label></br><input type="text" id="plazas" value="' + plazas + '" readonly></form>';
				}
				datos.innerHTML = definicion_datos;

			}
		}

	</script>

	</table>

</body>

</html>