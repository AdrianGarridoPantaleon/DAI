<?php
    include("../conexionPDo.php");
    include("../control.php");
    include("../eliminarTemporales.php");
    $nf = $_GET['nf'];

    $sql = "SELECT * FROM facturas WHERE Numero_Factura = '$nf'";

    $result = $conexion->query($sql);
    $row = $result->fetch();
    
    $mat = $row['Matricula'];
    $mo = $row['Mano_Obra'];
    $ph = $row['Precio_Hora'];
    $fe = $row['Fecha_Emision'];
    $fp = $row['Fecha_Pago'];
    $iva = $row['IVA'];

    $sql = "SELECT * FROM detalle_factura WHERE Numero_Factura = '$nf'";

    $result = $conexion->query($sql);
    $row = $result->fetch();

    $ref = $row['Referencia'];
    $unidades = $row['Unidades'];
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
    <div id="FacturaNueva">
        <form action="confirmFacturasUpdate.php" method="post" name="form" enctype="multipart/form-data">
            <label for="nf">Numero Factura: &emsp;</label>
            <input type="text" name="nf" max=7 readonly value="<?php echo $nf; ?>"/></br></br>
            <label for="mat">Matricula: &emsp;</label>
            <select name="mat">
            <?php 
                $sql = "SELECT Matricula FROM motocicletas ORDER BY Matricula";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();
                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows
                foreach ($rows as $row) {
                    $mat1 = $row['Matricula'];
                    if (strcmp($mat1, $mat) == 0)
                        echo "<option selected value='$mat1'>$mat1</option>";
                    else
                        echo "<option value='$mat1'>$mat1</option>";
                }   
            ?>
            </select></br></br>
            <label for="mo">Mano De Obra: &emsp;</label>
            <input type="number" name="mo" step="0.01" value="<?php echo $mo; ?>"/></br></br>
            <label for="ph">Precio/Hora: &emsp;</label>
            <input type="number" name="ph" step="0.01" value="<?php echo $ph; ?>"/></br></br>
            <label for="fe">Fecha Emision: &emsp;</label>
            <input type="date" name="fe" value="<?php echo $fe; ?>"/></br></br>
            <label for="fp">Fecha Pago: &emsp;</label>
            <input type="date" name="fp" value="<?php echo $fp; ?>"/></br></br>
            <label for="iva">IVA: &emsp;</label>
            <input type="number" name="iva" value="<?php echo $iva; ?>"/></br></br>
            <label for="ref">Referencia: &emsp;</label>
            <select name="ref">
            <?php 
                $sql = "SELECT Referencia FROM repuestos ORDER BY Referencia";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();
                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows
                foreach ($rows as $row) {
                    $ref1 = $row['Referencia'];
                    if ($ref1 == $ref)
                        echo "<option selected value='$ref1'>$ref1</option>";
                    else
                        echo "<option value='$ref1'>$ref1</option>";
                }   
            ?>
            </select></br></br>
            <label for="unidades">Unidades: &emsp;</label>
            <input type="number" name="unidades" value="<?php echo $unidades; ?>"/></br></br>

            <button type="submit" class="btn btn-primary">Actualizar Factura</button>
            <button type="reset" class="btn btn-warning">Reiniciar Valores</button>
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>