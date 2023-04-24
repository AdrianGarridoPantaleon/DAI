<!-- #include FILE="conexion.asp" -->

<!DOCTYPE html>
<html>
<head>
<style>
a{
text-decoration:none;
float:right;
margin-right: 50px;  
}

#jsp{
margin-right: 62px;
}

.gest{
  float:left;  
}
</style>
</head>
<body>
<a href="login.asp"><img src="imagenes/user.png" alt="user" width="50px" height="50px"/></a>

<h1>Agencia de viajes</h1>
<a href="http://localhost:8080/prueba/consultarReserva.jsp" id="jsp">JSP</a>
<h1>VUELOS DISPONIBLES</h1>
<%
 
    sql="select CIUDAD from CIUDAD"
    Set rs=Conexion.Execute(sql)
    Set rs2=Conexion.Execute(sql)
%>
<form method="post" action="listadoVuelos.asp">
Ciudad Origen: <select name="CiudadOrigen">
    <option>-</option>
    <% do until rs.Eof%>
    <option><%= rs("Ciudad")%></option>
    <% rs.MoveNext
    loop%>
</select>    

Ciudad Destino: <select name="CiudadDestino">
    <option>-</option>
    <% do until rs2.Eof%>
    <option><%= rs2("Ciudad")%></option>
    <% rs2.MoveNext
    loop%>

    <%
        Conexion.Close
        Set Conexion = nothing
    %>
</select><br/><br/>
    <input type="submit" value="Buscar">

<h1>GESTI&Oacute;N DE AVIONES</h1><br/>
<a class="gest" href="gestion_aviones.asp"><input type="button" value="Gestionar"></a>

</form>
</body>
</html>