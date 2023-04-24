<%@ page language="java" import="java.sql.*,org.firebirdsql.management.*"%>
<%@ include file="pruebaConexion.jsp"%>
<!DOCTYPE html>
<html>
<style>
   
      td,tr,th{
        text-align:center;
    }
    input{
        text-align:center;
		
    }
</style>
<body>
<h1>Consultar Reserva</h1>
    <form method="post" name="reserva_consultada" action="reserva_consultada.jsp">
	   <tr>
			<td>Ciudad Origen:</td>                
	   </tr>
	<select name="origen" id="origen">
	<option value="-">-</option>
<%
Connection conexion = DriverManager.getConnection(DB_CONNECTION_STRING,DB_USER, DB_PASSWORD); 
String sqlString = "SELECT CIUDAD FROM CIUDAD";
PreparedStatement sentencia = null; //query pre-compilado
ResultSet rs = null;

sentencia = conexion.prepareStatement(sqlString);
rs = sentencia.executeQuery(); //query que devuelve datos
while (rs.next()){
String ciudad_origen = (String) rs.getObject("CIUDAD");
out.println("<option>" + ciudad_origen + "</option>");
} 
%>   
</select>
<br><br>
    <tr>
        <td>DNI:</td>
        <td><input type="text" name="dni"></td>
    </tr>
	<br><br>		
    <tr>
       <td colspan="2"><input type="submit" id="consultar" value="Consultar" /></td>
    </tr>
       
    </form>
<%
	rs.close();
if (sentencia != null)
sentencia.close();
if (conexion != null)
conexion.close();
%>
</body>
</html>