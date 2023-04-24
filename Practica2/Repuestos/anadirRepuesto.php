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
    <div id="repuestoNuevo">
        <form action="confirmRepuestoAnadido.php" method="post" name="form" enctype="multipart/form-data">
            <label for="des">Descripcion: &emsp;</label>
            <input type="text" name="des" max=30/></br></br>
            <label for="importe">Importe: &emsp;</label>
            <input type="number" name="importe" step="any"/></br></br>
            <label for="ganancia">Ganancia: &emsp;</label>
            <input type="number" name="ganancia"/></br></br>
            <label for="foto">Foto: &emsp;</label>
            <input type="file" name="foto" /></br></br>

            <button type="submit" class="btn btn-primary">Añadir Repuesto</button>
            <button type="reset" class="btn btn-warning">Borrar</button>
            <a href='listarRepuestos.php'><input type="button" class="btn btn-success" value="Volver al listado Repuestos"/></a>
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>