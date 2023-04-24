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

        if (isset($_FILES['foto'])) 
        {
            if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $foto = $_FILES['foto']['tmp_name'];
                $fotografia = imagecreatefromjpeg($foto);
                ob_start();
                imagejpeg($fotografia);
                $jpg = ob_get_contents();
                ob_end_clean();

                $intermedio = addslashes(trim($jpg));
                $jpg = str_replace('##', '\##', $intermedio);

                $des = $_POST['des'];
                $impor = $_POST['importe'];
                $gana = $_POST['ganancia'];

                $SentenciaSQL = ("INSERT INTO repuestos(Descripcion, Importe, Ganancia ,Fotografia) VALUES ('$des', $impor, $gana, '$jpg')");

                $result = $conexion->query($SentenciaSQL);
                if (!$result) {
                    echo "</br><h2>Error al introducir el Repuesto en la BDD.</h2>";
                } else {
                    echo "</br><h2> El Repuesto se ha introducido con exito en la BDD.</h2>";
                }
            }else
                echo "<br/><h2> No se ha podido añadir el Repuesto en la BDD.</h2><br/>";
        }
    ?>
    </br></br>
    <a href='listarRepuestos.php'><input type="button" class="btn btn-success" value="Volver al listado clientes"/></a>
    <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
</body>

</html>