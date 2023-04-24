<!DOCTYPE html>
<html>
<head>
<style>
    table, th, td {
    border: 1px solid black;
    text-align: center;
    }

    a{
    text-decoration:none;    
    }

    a:hover{
    text-decoration:underline;    
    }

</style>
</head>
<body>
<form method="post" name="reserva" action="consultar_reserva.asp">
<h1>GESTI&Oacute;N DE RESERVA</h1>
<%
    ciudadOrigen=request.Form("CiudadOrigen")
    ciudadDestino=request.Form("CiudadDestino")
%>
<%
Set Conexion = Server.CreateObject("ADODB.Connection")
    Conexion.ConnectionString = "Data Source=agencia; USER=SYSDBA; PASSWORD=masterkey"
    Conexion.Mode = 1
    Conexion.Open

if ciudadOrigen = "-" and ciudadDestino = "-" then
    sql="select * from LISTA_VUELOS_PRECIO"

elseif  ciudadOrigen <> "-" and ciudadDestino = "-" then
    sql="select* from LISTA_VUELOS_PRECIO where CIUDAD_ORIGEN='" & ciudadOrigen & "'"

elseif  ciudadOrigen = "-" and ciudadDestino <> "-" then
    sql="select * from LISTA_VUELOS_PRECIO where CIUDAD_DESTINO='" & ciudadDestino & "'"

else
     sql="select * from LISTA_VUELOS_PRECIO where CIUDAD_ORIGEN='" & ciudadOrigen & "' AND CIUDAD_DESTINO='" & ciudadDestino & "'"

end if

set rs=Conexion.Execute(sql)

 if Err.Description <>"" then
    Response.Write("Error: " & Err.Description & "<br>")
end if

%>

<table>
    <tr>
        <th>Ciudad Origen</th>
        <th>Ciudad Destino</th>
        <th>Fecha</th>
        <th>N&ordm; de Plazas Disponibles</th>
        <th>Precio</th>
        <th>Reserva</th>
    </tr>
    <% do until rs.Eof%>
    <tr>
        <td><%=rs("CIUDAD_ORIGEN")%></td>
        <td><%=rs("CIUDAD_DESTINO")%></td>
        <td><%=rs("FECHA")%></td>
        <td><%=rs("N_PLAZAS_DISPONIBLES")%></td>
        <td><%=Round(rs("PRECIO"),2)%></td>
        <td>
        <%Response.Write("<button><a href=reserva.asp?id=" & rs("IDVUELO") & ">Reservar</a></button>")%>
        </td>
     
      
    </tr>
    <%rs.MoveNext
        loop%>


</table>
<input type="submit" value="Consultar Reservas"/>

 <%Conexion.Close
    Set rs= nothinG
    Set Conexion = nothing%>
</body>
</html>