<!-- #include file=conexion.asp -->
<%
var1=request.form("listar")
if var1<>"-" then
	'Mostramos todos los vuelos disponibles ya que no se ha marcado ningun origen y destino'
	resultado = "select DISTINCT CIUDAD_DESTINO from LISTA_VUELOS_PRECIO where CIUDAD_ORIGEN = '" & var1&"';"
else 
	resultado = "select DISTINCT CIUDAD_DESTINO from LISTA_VUELOS_PRECIO ;"
End If

' El contenido a devolver es XML
response.ContentType="text/xml"
response.CacheControl="no-cache, must-revalidate"
' Consulta SQL de las ciudades que son origen de algun vuelo
Set rs = Conexion.Execute(resultado)
	' Se genera una salida XML con la lista de vuelos
if (not(rs.Eof)) then
%><?xml version="1.0" encoding="UTF-8"?><%
	response.write("<XML>")
	' Recorremos el Recorset
	do until rs.Eof
		response.write("<vuelo>")
		response.write("<ciudad_destino>")
		response.write( rs("CIUDAD_DESTINO") )
		response.write("</ciudad_destino>")
		response.write("</vuelo>")
		rs.MoveNext
	loop
	response.write("</XML>")
	end if
%>