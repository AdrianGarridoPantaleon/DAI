<!-- #include FILE="conexion.asp" -->
<!DOCTYPE html>
<html>
<head>
<style>
td{
    text-align:center;
}

*{
    background:red;
}
</style>
</head>
<body>
<h1>DETALLES DEL AVI&Oacute;N</h1>
<%idavion=Request.QueryString("id")%>
<table border=1>
<tr><th>IDVUELO</th><th>CIUDAD_ORIGEN</th><th>CIUDAD_DESTINO</th><th>FECHA</th><th>COMPANIA</th><th>IDAVION</th><th>AVION</th><th>N_PLAZAS</th><th>N_PLAZAS_DISPONIBLES</th><th>DURACION</th><th>PRECIO</th></tr>
<% Set rs= Conexion.Execute("select IDVUELO,CIUDAD_ORIGEN,CIUDAD_DESTINO,FECHA,COMPANIA,IDAVION,AVION,N_PLAZAS,N_PLAZAS_DISPONIBLES,DURACION,PRECIO from LISTA_VUELOS_PRECIO WHERE IDAVION=" & idavion)
do while not rs.Eof
Response.Write("<tr><td>"& rs("IDVUELO")&"</td><td>"& rs("CIUDAD_ORIGEN")&"</td><td>"& rs("CIUDAD_DESTINO")&"</td><td>"& rs("FECHA")&"</td><td>"& rs("COMPANIA")&"</td><td>"& rs("IDAVION")&"</td><td>"& rs("AVION")&"</td><td>"& rs("N_PLAZAS")&"</td><td>"& rs("N_PLAZAS_DISPONIBLES")&"</td><td>"& rs("DURACION")&"</td><td>"& rs("PRECIO")&"</td></tr>")
rs.MoveNext
loop%>
</table>
</body>
</html>