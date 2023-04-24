<?php
    include("../conexionPDo.php");
    include("../control.php");
    include("../eliminarTemporales.php");
    $mat = $_GET['mat'];

    $sql = "SELECT * FROM motocicletas WHERE Matricula = '$mat'";

    $result = $conexion->query($sql);
    $row = $result->fetch();
    
    $mar = $row['Marca'];
    $mod = $row['Modelo'];
    $anyo = $row['Anyo'];
    $color = $row['Color'];
    $id = $row['Id_Cliente'];

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
        <form action="confirmMotoUpdate.php" method="post" name="form" enctype="multipart/form-data">
            <label for="mt">Matricula: &emsp;</label>
            <input type="text" name="mat" readonly value="<?php echo $mat; ?>"/></br></br>
            <label for="marca">Marca: &emsp;</label>
            <input type="text" name="mar" max=30 value="<?php echo $mar; ?>"/></br></br>
            <label for="mod">Modelo: &emsp;</label>
            <input type="text" name="mod" max=30 value="<?php echo $mod; ?>"/></br></br>
            <label for="anyo">Anyo: &emsp;</label>
            <input type="number" name="anyo" value="<?php echo $anyo; ?>"/></br></br>
            <label for="color">color: &emsp;</label>
            <input type="text" name="color" max=15 value="<?php echo $color; ?>"/></br></br>
            <label for="id">Id Cliente: &emsp;</label>
            <select name="id" selected value = "<?php echo $id; ?> ">
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

            <button type="submit" class="btn btn-primary">Actualizar Moto</button>&emsp;
            <button type="reset" class="btn btn-warning">Reiniciar Valores</button>&emsp;
            
            <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
        </form>
    </div>
</body>

</html>