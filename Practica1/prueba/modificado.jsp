<%@page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*,org.firebirdsql.management.*,java.util.*,java.io.*"%>
<%@ include file="pruebaConexion.jsp" %>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />

	</head>
	<body>
		<h1>Consulta de reservas JSP</h1>
		<table border=1>
			<tr>
				<th>IDAVION</th><th>AVION</th><th>PRECIO</th><th>PLAZAS</th>
			</tr>
		
			
			<%
				Connection conexion = DriverManager.getConnection(DB_CONNECTION_STRING,DB_USER, DB_PASSWORD);

				String idavion = request.getParameter("idavion");
				String avion = request.getParameter("avion");	
				String precio = request.getParameter("precio");	
				String plazas = request.getParameter("plazas");
				out.println("<tr><td>" + idavion + "</td><td>" + avion + "</td><td>" + precio + "</td><td>" + plazas + "</td></tr>");
				
				String SQL = "UPDATE AVION SET AVION=\'"+ avion + "\', PRECIO_BASE =" + precio + ", N_PLAZAS =" + plazas +" WHERE IDAVION = " + idavion ;
				
				PreparedStatement sentencia = null;
				ResultSet rs = null;
				boolean errorRs = false;
				boolean Registros = false;
				
				try
				{
					sentencia = conexion.prepareStatement(SQL);
					rs = sentencia.executeQuery();
					Registros = rs.next();
			
					
				}catch(SQLException e){
				
					errorRs = true;
				
				}
				
						
					if(sentencia != null){
					
					sentencia.close();
					}
					
					if(conexion != null){
						conexion.close();
					}
				
				%>
			
			</table>
				
            
	</body>
</html>