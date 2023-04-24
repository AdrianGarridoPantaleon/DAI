<?php
include("control.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1 class="inicio">Taller de Motocicletas</h1></br></br>
        <a href="Clientes/filtro.php"><input type="button" class="btn btn-primary" value="Listado de Clientes"/></a>&emsp;
        <a href="Motos/listarMotos.php"><input type="button" class="btn btn-primary" value="Listado de Motocicletas"/></a>&emsp;
        <a href="Repuestos/listarRepuestos.php"><input type="button"  class="btn btn-primary" value="Listado de Repuestos"/></a>&emsp;
        <a href="Facturas/filtroFacturas.php"><input type="button" class="btn btn-primary" value="Listado de Facturas"/></a>&emsp;
        <a href="cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
    </body>
</html>
