<?php
    include("../conexionPDo.php");
    include("../control.php");
    include("../eliminarTemporales.php");
    $id = $_GET['referencia'];

    $sql = "SELECT * FROM repuestos WHERE Referencia = $id";

    $result = $conexion->query($sql);
    $row = $result->fetch();

    $des = $row['Descripcion'];
    $imp = $row['Importe'];
    $ganan = $row['Ganancia'];
    $foto = $row['Fotografia'];

    $dir = getcwd();
    $flag = str_replace("\Repuestos", "", $dir);
    $imagen = basename(tempnam($flag . "/temporales", "temp"));
    $imagen .= ".jpg";

    $fichero = fopen("../temporales/" . $imagen, "w");
    fwrite($fichero, $foto);
    fclose($fichero);

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
    <div id="repuestoNuevo">
        <form action="confirmRepuestoUpdate.php" method="post" name="form" enctype="multipart/form-data">
            <label for="referencia">Referencia: &emsp;</label>
            <input type="number" name="referencia" readonly value="<?php echo $id; ?>"/></br></br>
            <label for="des">Descripcion: &emsp;</label>
            <input type="text" name="des" max=30 value="<?php echo $des; ?>"/></br></br>
            <label for="importe">Importe: &emsp;</label>
            <input type="number" name="importe" step="any" value="<?php echo $imp; ?>"/></br></br>
            <label for="ganancia">Ganancia: &emsp;</label>
            <input type="number" name="ganancia" value="<?php echo $ganan; ?>"/></br></br>
            <label for="foto">Foto: &emsp;</label>
            <input type="file" name="foto" value=<img src=../temporales/<?php echo $imagen ?> width=50 border=0></br></br>

            <button type="submit" class="btn btn-primary">Actualizar Repuesto</button>&emsp;
            <button type="reset" class="btn btn-warning">Reiniciar Valores</button>&emsp;
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>