<!-- #include FILE="conexion.asp" -->
<!DOCTYPE html>
<html>
<head>
    <title>Prueba Conexion</title>
</head>
<style>
    * {
        background-color: brown;
    }
      td,tr,th{
        text-align:center;
    }
    input{
        text-align:center;
    }
</style>
<body>
<h1>Reservas</h1>
<%
n_reserva=request.form("n_reserva")
nif=request.form("nif")
set datos = Conexion.Execute("SELECT * FROM RESERVA WHERE IDRESERVA= '" & n_reserva & "'")
%>
    <form method="post" name="cancelar_reserva" action="">
        <table border=1>
            <tr>
                <th>APELLIDOS</th>
                <th>NOMBRE</th>
                <th>ID VUELO</th>
                <th>N&ordm; ASIENTOS</th>
                <th>CANCELADO</th>
            </tr>
              <tr>                
                <td><input type="text" name="apellidos" readonly value=<% Response.Write(datos("APELLIDOS"))%>></td>            
              
                <td><input type="text" name="nombre" readonly value=<% Response.Write(datos("NOMBRE"))%>></td>
           
                <td><input type="text" name="idvuelo" readonly value=<% Response.Write(datos("IDVUELO"))%>></td>
                           
                <td><input type="text" name="nasientos" readonly value=<% Response.Write(datos("N_ASIENTOS"))%>></td>

                <td><%Response.Write("<Button><a href=cancelar_reserva.asp?id=" & n_reserva & ">Cancelar</Button></a>")%></td>    
            </tr>
            
        </table>
    </form>
</body>
</html>