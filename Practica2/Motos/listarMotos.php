<?php
include("../control.php");
?>
<DOCTYPE html>
    <html>

    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <form method="POST" action="eliminarMotosLista.php">
            <table border=1>
                <tr>
                    <th>
                        <center>Matricula</center>
                    </th>
                    <th>
                        <center>Marca</center>
                    </th>
                    <th>
                        <center>Modelo</center>
                    </th>
                    <th>
                        <center>Anyo</center>
                    </th>
                    <th>
                        <center>Color</center>
                    </th>
                    <th>
                        <center>Id Cliente</center>
                    </th>
                    <th>
                        <center>Borrar</center>
                    </th>
                </tr>
                <?php
                include("../conexionPDo.php");
                include("../eliminarTemporales.php");
                //definimos la cadena de la consulta
                $sql = "SELECT * FROM motocicletas order by Matricula";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();

                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows

                foreach ($rows as $row) {
                    $mat = $row['Matricula'];
                    $anyo = $row['Anyo'];
                    $marca = $row['Marca'];
                    $model = $row['Modelo'];
                    $color = $row['Color'];
                    $id = $row['Id_Cliente'];

                    echo "<tr>
                        <td><center>$mat</center></td>
                        <td><center><a href='updateMotos.php?mat=$mat'>$marca</a></center></td>
                        <td><center>$model</center></td>
                        <td><center>$anyo</center></td>
                        <td><center>$color</center></td>
                        <td><center>$id</center></td>
                        <td><center><input type='checkbox' name='borrar[]' value=$mat /></center></td>
                    </tr>";
                }
                ?>
            </table>
            </br></br>
            <a href="anadirMotos.php"><input type="button" class="btn btn-primary" value="Añadir nueva Moto"/></a>&emsp;
            <input type="submit" value="Eliminar Motos Seleccionadas">&emsp;
            <input type="reset" value="Deseleccionar Todos">&emsp;
        </form>
        <a href='../home.php'><input type="button" class="btn btn-success" value="Volver a Inicio"/></a>
        <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
    </body>

    </html>