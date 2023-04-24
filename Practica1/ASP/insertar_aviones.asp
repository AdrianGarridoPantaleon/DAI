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
<h1>A&Ntilde;ADIR AVI&Oacute;N</h1>
<% 
set consulta =Conexion.Execute("select max(IDAVION) as ultimo_id from AVION")
sig_id=consulta("ultimo_id")+1
%>
    <form method="post" name="formulario_avion" action="insertar_avion.asp">
        <table>
            <tr>
                <td>C&oacute;digo Avi&oacute;n:</td>
                <td><input type="text" name="idavion" readonly value=<% Response.Write(sig_id)%>></td>
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
                <td colspan="2"><input type="submit" id="introducir_avion" value="Introducir Avion" /></td>
            </tr>
        </table>
    </form>
</body>
</html>