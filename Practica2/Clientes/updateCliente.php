<?php
    include("../conexionPDo.php");
    include("../control.php");
    include("../eliminarTemporales.php");
    $id = $_GET['id_cliente'];

    $sql = "SELECT * FROM clientes WHERE Id_Cliente = $id";

    $result = $conexion->query($sql);
    $row = $result->fetch();

    $dni = $row['DNI'];
    $nombre = $row['Nombre'];
    $apellido1 = $row['Apellido1'];
    $apellido2 = $row['Apellido2'];
    $direccion = $row['Direccion'];
    $cp = $row['CP'];
    $poblacion = $row['Poblacion'];
    $provincia = $row['Provincia'];
    $telefono = $row['Telefono'];
    $email = $row['Email'];
    $foto = $row['Fotografia'];

    $dir = getcwd();
    $flag = str_replace("\Clientes", "", $dir);
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
    <div id="clienteNuevo">
        <form action="confirmClienteUpdate.php" method="post" name="form" enctype="multipart/form-data">
            <label for="id">ID: &emsp;</label>
            <input type="number" name="id" readonly value="<?php echo $id; ?>"/></br></br>
            <label for="dni">DNI: &emsp;</label>
            <input type="text" name="dni" max=9 value="<?php echo $dni; ?>"/></br></br>
            <label for="nombre">Nombre: &emsp;</label>
            <input type="text" name="nombre" max=15 value="<?php echo $nombre; ?>"/></br></br>
            <label for="apellido1">Apellido 1: &emsp;</label>
            <input type="text" name="apellido1" max=15 value="<?php echo $apellido1; ?>"/></br></br>
            <label for="apellido2">Apellido 2: &emsp;</label>
            <input type="text" name="apellido2" max=15 value="<?php echo $apellido2; ?>"/></br></br>
            <label for="Direccion">Direccion: &emsp;</label>
            <input type="text" name="direccion" max=50 value="<?php echo $direccion; ?>"/></br></br>
            <label for="cp">CP: &emsp;</label>
            <input type="text" name="cp" max=5 value="<?php echo $cp; ?>"/></br></br>
            <label for="poblacion">Poblacion: &emsp;</label>
            <input type="text" name="poblacion" max=15 value="<?php echo $poblacion; ?>"/></br></br>
            <label for="provincia">Provincia: &emsp;</label>
            <input type="text" name="provincia" max=15 value="<?php echo $provincia; ?>"/></br></br>
            <label for="telefono">Telefono: &emsp;</label>
            <input type="text" name="telefono" max=9 value="<?php echo $telefono; ?>"/></br></br>
            <label for="email">Email: &emsp;</label>
            <input type="text" name="email" max=30 value="<?php echo $email; ?>"/></br></br>
            <label for="foto">Foto: &emsp;</label>
            <input type="file" name="foto" value=<img src=../temporales/<?php echo $imagen ?> width=50 border=0></br></br>

            <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            <button type="reset" class="btn btn-warning">Reiniciar Valores</button>
            <a href='filtro.php'><input type="button" class="btn btn-success" value="Volver al listado clientes"/></a>
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
            
        </form>
    </div>
</body>

</html>