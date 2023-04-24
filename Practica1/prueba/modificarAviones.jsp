<%@ page language="java" import="java.sql.*,org.firebirdsql.management.*,java.io.*,java.util.*" %>
<%@ include file="pruebaConexion.jsp" %>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />

	</head>
	<body>
		
			<h1>Listado de Aviones JSP</h1>
			
			
			<%
			Connection conexion = DriverManager.getConnection(DB_CONNECTION_STRING,DB_USER, DB_PASSWORD);
				String SQL = "SELECT IDAVION, AVION, N_PLAZAS, PRECIO_BASE FROM AVION";
				
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
					%>
					
					<table>
						<tr>
							<td><b>ID Avion</b></td>
                            <td><b>AVION</b></td>
                            <td><b>N_PLAZAS</b></td>
                            <td><b>PRECIO_BASE</b></td>
                        </tr>
                        
					<%
					
						boolean ok = false;
						while(!ok){
							
							String idavion = rs.getString("IDAVION");
							String avion = (String) rs.getString("AVION");
							Integer plazas =  (Integer) rs.getObject("N_PLAZAS");
							Double precio = (Double) rs.getObject("PRECIO_BASE");							
							
                    %>

                                <tr>
								<td><a href=actualizar.jsp?idavion=<%=idavion%>><%=idavion%></a></td>
                                    <td><%=idavion%></td>
                                    <td><%=avion%></td>
                                    <td><%=plazas%></td>
                                    <td><%=precio%></td>
                                </tr>
							
					<%
							ok = !rs.next();
						}
					%>
					</table>
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