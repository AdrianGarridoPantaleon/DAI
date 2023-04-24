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
    <?php
        include("../conexionPDo.php");
        include("../control.php");

        $nf = $_POST['nf'];
        $mat = $_POST['mat'];
        $mo = $_POST['mo'];
        $ph = $_POST['ph'];
        $fe = $_POST['fe'];
        $fp = $_POST['fp'];
        $iva = $_POST['iva'];
        $ref = $_POST['ref'];
        $unidades = $_POST['unidades'];

        $SentenciaSQL = ("INSERT INTO detalle_factura(Numero_factura, Referencia, Unidades) VALUES ('$nf', $ref, $unidades)");

        $result = $conexion->query($SentenciaSQL);
        if (!$result) {
            echo "</br><h2>Error al introducir el Detalle De La Factura a la BDD.</h2><br/>";
        } else {
            echo "</br> <h2>El Detalle De La Factura se ha introducido con exito en la BDD.</h2><br/>";
        }
        $bi = 0;

        $sql = "SELECT Importe, Ganancia FROM Repuestos WHERE Referencia = $ref ORDER BY Referencia";
        //creamos la consulta y asignamos el resultado a la variable $result
        $result = $conexion->query($sql);
        $row = $result->fetch();
        //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows
        $imp = $row['Importe'];
        $gan = $row['Ganancia'];
        $bi += ($imp+(($gan * $imp) / 100)) * $unidades;
        $precioH = $ph * $mo;
        $bi += $precioH;
        $total = $bi + (($iva*$bi)/100);


        $SentenciaSQL = ("INSERT INTO facturas(Numero_factura, Matricula, Mano_Obra, Precio_Hora, Fecha_Emision, Fecha_Pago, Base_Imponible, IVA, Total) VALUES ('$nf', '$mat', $mo, $ph, '$fe', '$fp', $bi, $iva, $total)");

        $result = $conexion->query($SentenciaSQL);
        if (!$result) {
            echo "</br><h2>Error al introducir la Factura en la BDD.</h2><br/>";
        } else {
            echo "</br> <h2>La Factura se ha introducido con exito en la BDD.</h2><br/>";
        }
    ?>
    </br></br>
    <a href='filtroFacturas.php'><input type="button" class="btn btn-success" value="Volver al listado facturas"/></a>
    <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
</body>

</html>