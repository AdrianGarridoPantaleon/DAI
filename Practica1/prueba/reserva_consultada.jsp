<%@ page language="java" import="java.sql.*,org.firebirdsql.management.*,java.io.*,java.util.*" %>
<%@ include file="pruebaConexion.jsp" %>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resultado</title>
</head>
<body>
<h3>Resultado busqueda reservas</h3>

<table border=1><tr style='text-align: center;'>
  
                <th>IdReserva</th>
                <th>IdVuelo</th>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Ciudad Origen</th>
                <th>Ciudad Destino</th>
                <th>Fecha</th>
                <th>Compa&ntilde;&iacute;a</th>
                <th>Estado</th>
            </tr>

	<%
		String dni = request.getParameter("dni");
		String origen = request.getParameter("origen");
		Connection conexion = DriverManager.getConnection(DB_CONNECTION_STRING, DB_USER, DB_PASSWORD);
		Connection conexion2 = DriverManager.getConnection(DB_CONNECTION_STRING, DB_USER, DB_PASSWORD);

		PreparedStatement sentencia = null;
		ResultSet rs = null;
		ResultSet rs2 = null;
		String sql,sql2;
		 
		if (origen.equals("-")) {
		sql = "SELECT * FROM LISTADO_RESERVAS  WHERE NIF='"+dni+"'";
		}
		else{
			sql = "SELECT * FROM LISTADO_RESERVAS  WHERE NIF='"+dni+"' and CIUDAD_ORIGEN='"+origen+"'";
		}

		sql2 = "SELECT * FROM RESERVA WHERE NIF='"+dni+"'";

		try{
			sentencia = conexion.prepareStatement(sql);
			rs = sentencia.executeQuery();

			sentencia = conexion2.prepareStatement(sql2);
			rs2 = sentencia.executeQuery();
			while(rs.next()){
				rs2.next();
			Integer idReserva =(Integer)rs.getObject("IDRESERVA");
			String ciudadOrigen =(String)rs.getObject("CIUDAD_ORIGEN");
			String ciudadDestino =(String)rs.getObject("CIUDAD_DESTINO");
			Timestamp fecha=(Timestamp)rs.getObject("FECHA_VUELO");
			String compania =(String)rs.getObject("COMPANIA");
			Integer estado =(Integer)rs.getObject("CANCELADO");
			Integer idVuelo =(Integer)rs2.getObject("IDVUELO");
			String apellidos = (String)rs2.getObject("APELLIDOS");
			String nombre = (String)rs2.getObject("NOMBRE");

			out.println("<tr><th>"+idReserva+"</th>" + "<th>"+idVuelo+"</th>" + "<th>"+apellidos+"</th>" + "<th>"+nombre+"</th>" + "<th>"+ciudadOrigen+"</th>" + "<th>"+ciudadDestino+"</th>" + "<th>"+fecha+"</th>" + "<th>"+compania+"</th>" + "<th>"+estado+"</th></tr>");
		}
			}catch(SQLException e1){
			//out.println("Error: "+e1.getMessage());
		}
	%>
	
</table>
<%
rs.close();

if(sentencia!=null)
	sentencia.close();
if(conexion!=null)
	conexion.close();

%>
</body>
</html>