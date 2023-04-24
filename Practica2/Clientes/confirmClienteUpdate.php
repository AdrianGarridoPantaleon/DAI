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

    if (isset($_FILES['foto'])) {
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $foto = $_FILES['foto']['tmp_name'];
            $fotografia = imagecreatefromjpeg($foto);
            ob_start();
            imagejpeg($fotografia);
            $jpg = ob_get_contents();
            ob_end_clean();

            $intermedio = addslashes(trim($jpg));
            $jpg = str_replace('##', '\##', $intermedio);

            $id = $_POST['id'];
            $dni = $_POST['dni'];
            $nom = $_POST['nombre'];
            $a1 = $_POST['apellido1'];
            $a2 = $_POST['apellido2'];
            $dir = $_POST['direccion'];
            $cp = $_POST['cp'];
            $pobla = $_POST['poblacion'];
            $prnc = $_POST['provincia'];
            $tlfn = $_POST['telefono'];
            $email = $_POST['email'];

            $SentenciaSQL = ("UPDATE clientes SET DNI = '$dni', Nombre = '$nom', Apellido1 = '$a1', Apellido2 = '$a2', Direccion = '$dir', CP = '$cp', Poblacion = '$pobla', Provincia = '$prnc', Telefono = '$tlfn', Email = '$email', Fotografia = '$jpg' WHERE Id_Cliente = $id");

            $result = $conexion->query($SentenciaSQL);
            if (!$result) {
                echo "</br><h2>Error al actualizar el Cliente en la BDD.</h2>";
            } else {
                echo "</br> <h2>El Cliente se ha actualizado con exito en la BDD.</h2>";
            }
        }else
            echo "<br/> <h2>No se ha podido actualizar el cliente en la BDD.</h2><br/>";
    }else
        echo "<br/> <h2>No se ha podido actualizar el cliente en la BDD.</h2><br/>";
    ?>
    </br></br>
    <a href='filtro.php'><input type="button" class="btn btn-success" value="Volver al listado clientes"/></a>
    <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
</body>

</html>