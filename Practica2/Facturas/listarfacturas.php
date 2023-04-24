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
        <form method="POST" action="eliminarFacturasLista.php">
            <table border=1>
                <tr>
                    <th>
                        <center>Numero Factura</center>
                    </th>
                    <th>
                        <center>Matricula</center>
                    </th>
                    <th>
                        <center>Mano De Obra</center>
                    </th>
                    <th>
                        <center>Precio/Hora</center>
                    </th>
                    <th>
                        <center>Fecha De Emision</center>
                    </th>
                    <th>
                        <center>Fecha De Pago</center>
                    </th>
                    <th>
                        <center>Base Imponible</center>
                    </th>
                    <th>
                        <center>IVA</center>
                    </th>
                    <th>
                        <center>Total</center>
                    </th>
                    <th>
                        <center>Añadir Nuevo Detalle-Factura</center>
                    </th>
                    <th>
                        <center>Borrar</center>
                    </th>
                </tr>
                <?php
                include("../conexionPDo.php");
                include("../eliminarTemporales.php");

                $fi = $_POST['fi'];
                $ff = $_POST['ff'];

                if (strcmp($fi,"") != 0  && strcmp($ff,"") != 0)
                    $sql = "SELECT * FROM facturas WHERE Fecha_Pago BETWEEN '$fi' AND '$ff' order by Numero_Factura";
                else
                    $sql = "SELECT * FROM facturas order by Numero_Factura";
                //creamos la consulta y asignamos el resultado a la variable $result
                $result = $conexion->query($sql);
                $rows = $result->fetchAll();

                //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows

                foreach ($rows as $row) {
                    $nf = $row['Numero_Factura'];
                    $mat = $row['Matricula'];
                    $mo = $row['Mano_Obra'];
                    $ph = $row['Precio_Hora'];
                    $fe = $row['Fecha_Emision'];
                    $fp = $row['Fecha_Pago'];
                    $bi = $row['Base_Imponible'];
                    $iva = $row['IVA'];
                    $total = $row['Total'];
                    $bi = number_format((float)$bi, 2, '.', '');
                    $total = number_format((float)$total, 2, '.', '');

                    echo "<tr>
                        <td><center><a href='updateFacturas.php?nf=$nf'>$nf</a></center></td>
                        <td><center>$mat</center></td>
                        <td><center>$mo h.</center></td>
                        <td><center>$ph</center></td>
                        <td><center>$fe</center></td>
                        <td><center>$fp</center></td>
                        <td><center>$bi €</center></td>
                        <td><center>$iva %</center></td>
                        <td><center>$total €</center></td>
                        <td><center><a href='anadirDetalleFactura.php?nf=$nf'>Añadir Nueva-Factura</a></center></td>
                        <td><center><input type='checkbox' name='borrar[]' value=$nf /></center></td>
                    </tr>";
                }
                ?>
            </table>
            </br></br>
            <a href="anadirFacturas.php"><input type="button" class="btn btn-primary" value="Añadir Factura"/></a>&emsp;
            <input type="submit" value="Eliminar Facturas Seleccionadas">&emsp;
            <input type="reset" value="Deseleccionar Todos">&emsp;
        </form>
        <a href="../home.php"><input type="button" class="btn btn-success" value="Volver al inicio"/></a>
        <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
    </body>

    </html>