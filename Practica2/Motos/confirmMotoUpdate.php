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

        $mat = $_POST['mat'];
        $mar = $_POST['mar'];
        $mod = $_POST['mod'];
        $anyo = $_POST['anyo'];
        $color = $_POST['color'];
        $id = $_POST['id'];

        $SentenciaSQL = ("UPDATE motocicletas SET Matricula = '$mat', Marca = '$mar', Modelo = '$mod', Anyo = $anyo, Color = '$color', Id_Cliente = $id WHERE Matricula = '$mat'");

        $result = $conexion->query($SentenciaSQL);
        if (!$result) {
            echo "</br><h2>Error al actualizar la Moto en la BDD.</h2>";
        } else {
            echo "</br> </h2>La Moto se ha actualizado con exito en la BDD.</h2>";
        }
    ?>
    </br></br>
    <a href='listarMotos.php'><input type="button" class="btn btn-success" value="Volver al listado motos"/></a>
    <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
</body>

</html>