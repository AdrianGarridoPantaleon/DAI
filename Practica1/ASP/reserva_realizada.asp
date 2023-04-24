<!-- #include FILE="conexion.asp" -->

<!DOCTYPE html>
<html>
<head>
<style>
*{
background-color:green;
}
</style>
</head>
<body>
<% 
    idvuelo=Request.form("idvuelo")
    nombre=Request.form("nombre")
    apellidos=Request.form("apellidos")
    nasientos=Request.form("nasientos")
    nif=Request.form("nif")

set consulta =Conexion.Execute("select max(IDRESERVA) as ultimo_id from RESERVA")
sig_id=consulta("ultimo_id")+1

set precio = Conexion.Execute("select PRECIO,CIUDAD_ORIGEN, CIUDAD_DESTINO from LISTA_VUELOS_PRECIO where IDVUELO=" & idvuelo)

precio_total= precio("PRECIO")* nasientos

ciudadOrigen=precio("CIUDAD_DESTINO")
ciudadDestino=precio("CIUDAD_ORIGEN")

   
       sql="insert into RESERVA values(" & sig_id & ", '" & apellidos & "', '" & nombre & "',' " & nif & "', '" & idvuelo & "','" & nasientos & "'," & 0 & ")"
      set rs=Conexion.Execute(sql)
      ' sql2="DELETE from RESERVA WHERE IDRESERVA > 3"
      ' set rs=Conexion.Execute(sql2)
    
    Response.Write("El ID de tu Reserva es: " & sig_id )%><br/><%

    Response.Write("El Precio de tu Vuelo es: " & precio_total)

    %><h2>VUELTA</h2><table border=1><tr><th>Origen</th><th>Destino</th><th>Reserva</th></tr><%

    Response.Write("<tr><td>" &ciudadOrigen & "</td><td>" & ciudadDestino & "</td><td><button><a href=reserva.asp?id=" & idvuelo & ">Reservar</a></button></td></tr></table>")

    conexion.Close
    set conexion=nothing
%>      
</body>
</html>