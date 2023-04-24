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
    <div id="motoNueva">
        <form action="confirmMotoAnadido.php" method="post" name="form" enctype="multipart/form-data">
            <label for="mat">Matricula: &emsp;</label>
            <input type="text" name="mat" max=7/></br></br>
            <label for="marca">Marca: &emsp;</label>
            <input type="text" name="marca" max=30/></br></br>
            <label for="model">Modelo: &emsp;</label>
            <input type="text" name="model" max=30/></br></br>
            <label for="anyo">Anyo: &emsp;</label>
            <input type="number" name="anyo"/></br></br>
            <label for="color">Color: &emsp;</label>
            <input type="text" name="color" max=15/></br></br>
            <label for="id">Id Cliente: &emsp;</label>
            <select name="id">
            <option value="-" disabled="disabled" selected>Seleccione un Id Cliente</option>
            <?php 
                $sql = "SELECT Id_Cliente FROM clientes ORDER BY Id_Cliente";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();
                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows
                foreach ($rows as $row) {
                    $id = $row['Id_Cliente'];
                    echo "<option value='$id'>$id</option>";
                }   
            ?>
            </select></br></br>

            <button type="submit" class="btn btn-primary">Añadir Moto</button>&emsp;
            <button type="reset" class="btn btn-warning">Borrar</button>&emsp;
            <a href='listarMotos.php'><input type="button" class="btn btn-success" value="Volver al listado motos"/></a>
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>