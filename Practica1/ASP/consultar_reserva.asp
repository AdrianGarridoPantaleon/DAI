<!-- #include FILE="conexion.asp" -->
<!DOCTYPE html>
<html>
<head>
    <title>Prueba Conexion</title>
</head>
<style>
    * {
        background-color: orange;
    }
</style>
<body>
<h1>Consultar Reserva</h1>

    <form method="post" name="reserva_consultada" action="reserva_consultada.asp">
        <table>
            <tr>
                <td>N&uacute;mero de Reserva:</td>
                <td><input type="text" name="n_reserva"></td>
            </tr>
            <tr>
                <td>NIF:</td>
                <td><input type="text" name="nif"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" id="consultar" value="Consultar" /></td>
            </tr>
        </table>
    </form>
</body>
</html>