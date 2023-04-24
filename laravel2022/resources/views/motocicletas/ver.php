<!DOCTYPE html>
<html>
    <body>
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
                </tr>
                <?php

                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows

                foreach ($motos as $moto) {
                    $mat = $moto->Matricula;
                    $anyo = $moto->Anyo;
                    $marca = $moto->Marca;
                    $model = $moto->Modelo;
                    $color = $moto->Color;
                    $id = $moto->Id_Cliente;

                    echo "<tr>
                        <td><center>$mat</center></td>
                        <td><center>$marca</center></td>
                        <td><center>$model</center></td>
                        <td><center>$anyo</center></td>
                        <td><center>$color</center></td>
                        <td><center>$id</center></td>
                    </tr>";
                }
                ?>
            </table>
            </br></br>
    </body>
</html>