<!-- #include file=conexion.asp -->

<%
origen=request.querystring("origen")
destino=request.querystring("destino")
fecha=request.querystring("fecha")
compania=request.querystring("compania")
avion=request.querystring("avion")
duracion=request.querystring("duracion")
id=request.querystring("identificador")
idvuelo=request.querystring("idvuelo")

Set numero = Conexion.Execute("select MAX(IDVUELO)as maximo FROM VUELO")
  numero=numero("maximo")+1

if id="1" then
	query ="INSERT INTO VUELO VALUES ("&numero &", "& origen &", "& destino &",'"& fecha &"', "& compania &", "& avion &", "& duracion &",0)"
	set sql=Conexion.Execute(query)
elseif id="2" or id="4" then 
	set resultado =Conexion.Execute( "select * from VUELO WHERE IDVUELO="&idvuelo)
	
	response.ContentType="text/xml"
response.CacheControl="no-cache, must-revalidate"
	' Se genera una salida XML con la lista de vuelos
		if (not(resultado.Eof)) then
		%><?xml version="1.0" encoding="UTF-8"?><%
			response.write("<XML>")
			' Recorremos el Recorset
				response.write("<vuelo>")
				response.write("<idvuelo>")
				response.write( resultado("IDVUELO") )
				response.write("</idvuelo>")
				response.write("<ciudad_origen>")
				response.write( resultado("IDCIUDADORIGEN") )
				response.write("</ciudad_origen>")
				response.write("<ciudad_destino>")
				response.write( resultado("IDCIUDADDESTINO") )
				response.write("</ciudad_destino>")
				response.write("<fecha>")
				response.write(resultado("FECHA") )
				response.write("</fecha>")
				response.write("<compania>")
				response.write( resultado("IDCOMPANIA") )
				response.write("</compania>")
				response.write("<avion>")
				response.write( resultado("IDAVION") )
				response.write("</avion>")
				response.write("<duracion>")
				response.write( resultado("DURACION") )
				response.write("</duracion>")
				response.write("<plazas>")
				response.write( resultado("N_PLAZAS_DISPONIBLES") )
				response.write("</plazas>")
				response.write("</vuelo>")
			response.write("</XML>")
		end if
	
elseif id="3" then
	query2 ="UPDATE VUELO SET IDCIUDADORIGEN= "& origen &",IDCIUDADDESTINO= "& destino &",FECHA='"& fecha &"',IDCOMPANIA="& compania &",IDAVION= "& avion &",DURACION= "& duracion &"WHERE IDVUELO="&idvuelo&";"
	set sql=Conexion.Execute(query2)
	response.write( query2)
	
	
End If





%>