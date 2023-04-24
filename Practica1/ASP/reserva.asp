<!-- #include FILE="conexion.asp" -->
<!DOCTYPE html>
<html>
<head>
    <title>Prueba Conexion</title>
</head>
<style>
    * {
        background-color: aqua;
    }
</style>
<body>
<% 
idVuelo=Request.QueryString("id")
set precio = Conexion.Execute("SELECT PRECIO, N_PLAZAS_DISPONIBLES FROM LISTA_VUELOS_PRECIO WHERE IDVUELO= '" & idVuelo & "'")

%>
<h1>GESTI&Oacute;N DE RESERVA</h1>
    <form method="post" name="reserva" action="reserva_realizada.asp">
        <table>
            <tr>
                <td>IDVUELO:</td>
                <td><input type="text" name="idvuelo" readonly value=<% Response.Write(idVuelo)%>></td>
            </tr>
            <tr>
                <td>NOMBRE:</td>
                <td><input type="text" name="nombre"></td>
            </tr>
            <tr>
                <td>APELLIDOS:</td>
                <td><input type="text" name="apellidos"></td>
            </tr>
             <tr>
                <td>N&ordm; ASIENTOS:</td>
                <td><input type="text" name="nasientos"></td>
                <td>N&ordm; ASIENTOS DISPONIBLES:</td>
                <td><input type="text" name="nasientos_disponibles" readonly value=<% Response.Write(precio("N_PLAZAS_DISPONIBLES"))%>></td>
            </tr>
             <tr>
                <td>NIF:</td>
                <td><input type="text" name="nif"></td>
            </tr>
           
        </table>
         <br/> 
        Precio del billete: <% Response.Write(Round(precio("PRECIO"),2)) & "  EUROS"%>
         <br/><br/>
        <input type="submit" id="reservar" value="Confirmar Reserva" />
    </form>
</body>
</html>