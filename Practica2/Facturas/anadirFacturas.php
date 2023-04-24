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
        <form action="confirmFacturasAnadido.php" method="post" name="form" enctype="multipart/form-data">
            <label for="nf">Numero Factura: &emsp;</label>
            <input type="text" name="nf" max=7 /></br></br>
            <label for="mat">Matricula: &emsp;</label>
            <select name="mat">
            <option value="-" disabled="disabled" selected>Seleccione una Matricula</option>
            <?php 
                $sql = "SELECT Matricula FROM motocicletas ORDER BY Matricula";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();
                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows
                foreach ($rows as $row) {
                    $mat = $row['Matricula'];
                    echo "<option value='$mat'>$mat</option>";
                }   
            ?>
            </select></br></br>
            <label for="mo">Mano de Obra: &emsp;</label>
            <input type="number" name="mo" /></br></br>
            <label for="ph">Precio/Hora: &emsp;</label>
            <input type="number" name="ph" step="0.01" /></br></br>
            <label for="fe">Fecha Emision: &emsp;</label>
            <input type="date" name="fe" /></br></br>
            <label for="fp">Fecha Pago: &emsp;</label>
            <input type="date" name="fp" /></br></br>
            <label for="iva">IVA: &emsp;</label>
            <input type="number" name="iva"/></br></br>
            <label for="ref">Referencia: &emsp;</label>
            <select name="ref">
            <option value="-" disabled="disabled" selected>Seleccione una Referencia</option>
            <?php 
                $sql = "SELECT Referencia FROM Repuestos ORDER BY Referencia";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();
                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows
                foreach ($rows as $row) {
                    $ref = $row['Referencia'];
                    echo "<option value='$ref'>$ref</option>";
                }   
            ?>
            </select></br></br>
            <label for="unidades">Unidades: &emsp;</label>
            <input type="number" name="unidades"/></br></br>

            <button type="submit" class="btn btn-primary">Añadir Factura</button>&emsp;
            <button type="reset" class="btn btn-warning">Borrar</button>&emsp;
            <a href='filtroFacturas.php'><input type="button" class="btn btn-success" value="Volver al listado facturas"/></a>
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>