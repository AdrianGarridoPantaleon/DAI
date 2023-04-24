<?php
include("../control.php");
include("../conexionPDo.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="facturaNueva">
        <h2>Introduzca unas fechas entre las que se encuente la factura que desea encontrar:</h2>
        <form action="listarfacturas.php" method="post" name="form" enctype="multipart/form-data">
            <label for="fe">Fecha Inicio: &emsp;</label>
            <input type="date" name="fi" /></br></br>
            <label for="fp">Fecha Final: &emsp;</label>
            <input type="date" name="ff" /></br></br>

            <button type="submit" class="btn btn-primary">Buscar Factura</button>&emsp;
            <button type="reset" class="btn btn-warning">Borrar</button>&emsp;
            <a href='filtroFacturas.php'><input type="button" class="btn btn-success" value="Volver al listado facturas"/></a>
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>