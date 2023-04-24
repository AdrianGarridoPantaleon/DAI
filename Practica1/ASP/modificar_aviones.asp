<!-- #include FILE="conexion.asp" -->
<!DOCTYPE html>
<html>
<head>
    <title>Prueba Conexion</title>
</head>
<style>
    * {
        background-color: yellow;
    }
</style>
<body>
<h1>MODIFICAR AVI&Oacute;N</h1>
<% 
idavion=Request.QueryString("id")
%>
    <form method="post" name="formulario_avion" action="modificar_avion.asp">
        <table>
            <tr>
                <td>C&oacute;digo Avi&oacute;n:</td>
                <td><input type="text" name="idavion" readonly value=<% Response.Write(idavion)%>></td>
            </tr>
            <tr>
                <td>Avi&oacute;n:</td>
                <td><input type="text" name="avion"></td>
            </tr>
            <tr>
                <td>N&ordm; Plazas:</td>
                <td><input type="text" name="n_plazas"></td>
            </tr>
            <tr>
                <td>Precio Base:</td>
                <td><input type="text" name="precio_base"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" id="modificar_avion" value="Modificar Avion" /></td>
            </tr>
        </table>
    </form>
</body>
</html>