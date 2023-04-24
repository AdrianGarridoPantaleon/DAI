<%@page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*,org.firebirdsql.management.*"%>
<%@ include file="pruebaConexion.jsp" %>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />

	</head>
	<body>

			<h1>Consulta de reservas JSP</h1>
			
			
			
			
			<% 
			    Connection conexion = DriverManager.getConnection(DB_CONNECTION_STRING,DB_USER, DB_PASSWORD);

				String idavion = request.getParameter("idavion");		
				String SQL = "SELECT IDAVION, AVION, N_PLAZAS, PRECIO_BASE FROM AVION WHERE IDAVION = " + idavion  ;
				
				PreparedStatement sentencia = null;
				ResultSet rs = null;
				boolean errorRs= false;
				boolean Registros = false;
				
				try
				{
					sentencia = conexion.prepareStatement(SQL);
					rs = sentencia.executeQuery();
					Registros = rs.next();
					
				}catch(SQLException e){
				
					errorRs = true;				
			%>
			
			<p> ERROR: <%= e.getMessage() %>
			
			<%
				}
				
				if(Registros)
				{
				
					boolean ok = false;
										
					String avion = (String) rs.getString("AVION");
					Integer plazas =  (Integer) rs.getObject("N_PLAZAS");
					Double precio = (Double) rs.getObject("PRECIO_BASE");
							
							
                    %>

						<form class="col s12" method="POST" action="modificado.jsp">
							
								  <input name="idavion" type="text" class="validate" readonly value= <%= idavion %> >
							
							
								  <input placeholder="AVION:" name="avion" type="text" class="validate" value= <%= avion %> >
								  
							
								  <input placeholder="plazas:" name="plazas" type="text" class="validate" value= <%= plazas %> >
						
						
								  <input placeholder="precio:" name="precio" type="text" class="validate" value= <%= precio %> >
					

								  <input class="waves-effect waves-light btn" type="submit" value="Enviar">
						</form>
					<%
				}
				else{
				
					%>
				
					<p> No hay resultados </p>
				
					<%
				}
				
				if(sentencia != null){
					
					sentencia.close();
				}
				
				if(conexion != null){
					conexion.close();
				}
				
				%>		
				
	</body>
</html>