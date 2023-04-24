<!-- #include FILE="conexion.asp" -->
<!-- #include FILE="seguridad.asp" -->

<!DOCTYPE html>
<html>
<head>
<style>
img{
    background:none;
    float:right;
}

a{
    float:right;
    text-decoration:none;
}

#jsp{
margin-right:50px;
margin-top:25px;
}

.add{
    float:left;
}

td{
    text-align:center;
}
</style>
</head>
<body>
<a href="http://localhost:8080/prueba/modificarAviones.jsp" id="jsp">MODIFICAR JSP</a>
<h1>AVIONES</h1>
<table border=1>
<tr><th>ID AVI&Oacute;N</th><th>AVI&Oacute;N</th><th>N&ordm; Plazas</th><th>Precio Base</th><th>Modificar</th><th>Eliminar</th><th>Detalles</th></tr>
<% Set datos= Conexion.Execute("select * from AVION")
do while not datos.Eof
Response.Write("<tr><td>"& datos("IDAVION")&"</td><td>"& datos("AVION")&"</td><td>"& datos("N_PLAZAS")&"</td><td>"& datos("PRECIO_BASE")&"</td><td><a href="&"modificar_aviones.asp?id="& datos("IDAVION") &"><img src="&"imagenes/lapiz.png"&" alt=" & "lapiz" &"width=" & "20px"&" height="&"20px" &"/></a></td><td><a href="&"eliminar_avion.asp?id="& datos("IDAVION")&"><img src="&"imagenes/papelera.png"&" alt=" & "papelera" &"width=" & "25px"&" height="&"25px" &"/></a></td><td><a href="&"detalles_avion.asp?id="& datos("IDAVION")&"><img src="&"imagenes/ojo.png"&" alt=" & "ojo" &"width=" & "25px"&" height="&"25px" &"/></a></td></tr>")
datos.MoveNext
loop%>
</table><br/><br/>
<a class="add" href="insertar_aviones.asp"><img src="imagenes/add.png" alt="add" width="25px" height="25px"/>A&Ntilde;ADIR &nbsp;</a>
</body>
</html>