<!-- #include file=conexion.asp -->
<%


	listar=request.form("listar") 
  destinos=Request.Form("destinos")

  if listar<>"-" and destinos="-" then
	'Mostramos todos los vuelos disponibles ya que no se ha marcado ningun origen y destino'
	resultado = "select IDVUELO,CIUDAD_ORIGEN,CIUDAD_DESTINO,FECHA,COMPANIA,AVION,PRECIO,DURACION from LISTA_VUELOS_PRECIO where CIUDAD_ORIGEN = '" & listar&"';"
elseif listar="-" and destinos<>"-" then
	resultado = "select IDVUELO,CIUDAD_ORIGEN,CIUDAD_DESTINO,FECHA,COMPANIA,AVION,PRECIO,DURACION from LISTA_VUELOS_PRECIO where CIUDAD_DESTINO = '"&destinos&"';"
elseif  listar <>"-" and destinos <> "-" then 
	resultado = "select IDVUELO,CIUDAD_ORIGEN,CIUDAD_DESTINO,FECHA,COMPANIA,AVION,PRECIO,DURACION from LISTA_VUELOS_PRECIO where CIUDAD_DESTINO = '" & destinos&"' AND CIUDAD_ORIGEN = '" & listar&"';"
else 
	resultado = "select IDVUELO,CIUDAD_ORIGEN,CIUDAD_DESTINO,FECHA,COMPANIA,AVION,PRECIO,DURACION from LISTA_VUELOS_PRECIO ;"
End If
	' compania=1
	 
    ' El contenido a devolver es XML


	 response.ContentType="text/xml"
	 response.CacheControl="no-cache, must-revalidate"


	 	  

      ' Consulta SQL de las ciudades que son origen de algun vuelo

        Set rs = Conexion.Execute(resultado)


       ' Se genera una salida XML con la lista de vuelos
	  
        if (not(rs.Eof)) then

		%><?xml version="1.0" encoding="UTF-8"?> <%
		response.write("<XML>")
  	     
           ' Recorremos el Recorset
           do until rs.Eof

	      response.write("<vuelo>")
          response.write("<idvuelo>")
          response.write( rs("IDVUELO") )
          response.write("</idvuelo>")

          response.write("<ciudad_origen>")
          response.write( rs("CIUDAD_ORIGEN") )
          response.write("</ciudad_origen>")

          response.write("<ciudad_destino>")
          response.write( rs("CIUDAD_DESTINO") )
          response.write("</ciudad_destino>")

          response.write("<fecha>")
          response.write( rs("FECHA") )
          response.write("</fecha>")

          response.write("<compania>")
          response.write( rs("COMPANIA") )
          response.write("</compania>")

          response.write("<avion>")
          response.write( rs("AVION") )
          response.write("</avion>")

          response.write("<precio>")
          response.write( rs("PRECIO") )
          response.write("</precio>")

          response.write("<duracion>")
          response.write( rs("DURACION") )
          response.write("</duracion>") 

          response.write("</vuelo>")
             
			 
		   rs.MoveNext
           loop

           response.write("</XML>")
    
         end if  
%>    