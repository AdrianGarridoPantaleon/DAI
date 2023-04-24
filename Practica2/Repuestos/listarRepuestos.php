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
        <form method="POST" action="eliminarRepuestosLista.php">
            <table border=1>
                <tr>
                    <th>
                        <center>Referencia</center>
                    </th>
                    <th>
                        <center>Descripcion</center>
                    </th>
                    <th>
                        <center>Importe</center>
                    </th>
                    <th>
                        <center>Ganancia</center>
                    </th>
                    <th>
                        <center>Fotografia</center>
                    </th>
                    <th>
                        <center>Borrar</center>
                    </th>
                </tr>
                <?php
                include("../conexionPDo.php");
                include("../eliminarTemporales.php");
                //definimos la cadena de la consulta
                $sql = "SELECT * FROM repuestos order by Referencia";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();

                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows

                foreach ($rows as $row) {
                    $referencia = $row['Referencia'];
                    $descripcion = $row['Descripcion'];
                    $importe = $row['Importe'];
                    $ganancia = $row['Ganancia'];
                    $fotografia = $row['Fotografia'];

                    $dir = getcwd();
                    $flag = str_replace("\Repuestos", "", $dir);
                    $imagen = basename(tempnam($flag . "/temporales", "temp"));
                    $imagen .= ".jpg";

                    $fichero = fopen("../temporales/" . $imagen, "w");
                    fwrite($fichero, $fotografia);
                    fclose($fichero);

                    echo "<tr>
                        <td><center>$referencia</center></td>
                        <td><center><a href='updateRepuesto.php?referencia=$referencia'>$descripcion</a></center></td>
                        <td><center>$importe €</center></td>
                        <td><center>$ganancia %</center></td>
                        <td><center><a href=../temporales/$imagen><img src=../temporales/$imagen width=50 border=0></a></center></td>
                        <td><center><input type='checkbox' name='borrar[]' value=$referencia /></center></td>
                    </tr>";
                }
                ?>
            </table>
            </br></br>
            <a href="anadirRepuesto.php"><input type="button" class="btn btn-success" value="Añadir nuevo Repuesto"/></a>&emsp;
            <input type="submit" value="Eliminar Respuestos Seleccionados">&emsp;
            <input type="reset" value="Deseleccionar Todos">&emsp;
        </form>
        <a href="../home.php"><input type="button" class="btn btn-primary" value="Volver al inicio"/></a>&emsp;
        <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
    </body>

    </html>