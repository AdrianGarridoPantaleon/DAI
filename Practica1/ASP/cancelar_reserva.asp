<!-- #include FILE="conexion.asp" -->
<!DOCTYPE html>
<html>
<head>
    <title>Prueba Conexion</title>
</head>
<style>
    * {
        background-color: green;
    }
    td,tr,th{
        text-align:center;
    }

</style>
<body>
<h1>Reserva cancelada</h1>
<%
n_reserva=request.QueryString("id")

on Error Resume Next
set datos = Conexion.Execute("UPDATE RESERVA SET CANCELADO=1 WHERE IDRESERVA=" & n_reserva )
if Conexion.Errors.Count>0 then

for each objErr in Conexion.Errors
    Response.write("<p>")
    Response.Write("Error al cancelar: ")
    Response.Write(objErr.Description & "</p>")
next

else
    Response.Write("Cancelaci&oacute;n correcta")
end if
%>
<br/><br/>
<a href="main.asp"><input type="submit" value="Inicio" /></a>
<a href="consultar_reserva.asp"><input type="submit" value="Consultar m&aacute;s reservas" /></a>

<br/><br/>
</body>
</html>