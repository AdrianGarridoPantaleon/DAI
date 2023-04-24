<?php
    include("../conexionPDo.php");
    include("../control.php");
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
        <h2>Introduzca los campos que desea buscar:</h2>
        <form action="copiaListarCliente.php" method="post" name="form" enctype="multipart/form-data">
            <label for="dni">DNI: &emsp;</label>
            <input type="text" name="dni" max=9/></br></br>
            <label for="nombre">Nombre: &emsp;</label>
            <input type="text" name="nombre" max=15/></br></br>
            <label for="apellido1">Apellido 1: &emsp;</label>
            <input type="text" name="apellido1" max=15/></br></br>
            <label for="apellido2">Apellido 2: &emsp;</label>
            <input type="text" name="apellido2" max=15/></br></br>
            <label for="Direccion">Direccion: &emsp;</label>
            <input type="text" name="direccion" max=50/></br></br>
            <label for="cp">CP: &emsp;</label>
            <input type="text" name="cp" max=5/></br></br>
            <label for="poblacion">Poblacion: &emsp;</label>
            <input type="text" name="poblacion" max=15/></br></br>
            <label for="provincia">Provincia: &emsp;</label>
            <input type="text" name="provincia" max=15/></br></br>
            <label for="telefono">Telefono: &emsp;</label>
            <input type="text" name="telefono" max=9/></br></br>
            <label for="email">Email: &emsp;</label>
            <input type="text" name="email" max=30/></br></br>

            <button type="submit" class="btn btn-primary">Buscar cliente</button>
            <button type="reset" class="btn btn-warning">Borrar</button>
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>