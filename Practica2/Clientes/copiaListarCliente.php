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
        <form method="POST" action="eliminarClientesLista.php">
            <table border=1>
                <tr>
                    <th>
                        <center>ID_CLIENTE</center>
                    </th>
                    <th>
                        <center>DNI</center>
                    </th>
                    <th>
                        <center>NOMBRE</center>
                    </th>
                    <th>
                        <center>APELLIDO1</center>
                    </th>
                    <th>
                        <center>APELLIDO2</center>
                    </th>
                    <th>
                        <center>DIRECCION</center>
                    </th>
                    <th>
                        <center>CP</center>
                    </th>
                    <th>
                        <center>POBLACION</center>
                    </th>
                    <th>
                        <center>PROVINCIA</center>
                    </th>
                    <th>
                        <center>TELEFONO</center>
                    </th>
                    <th>
                        <center>EMAIL</center>
                    </th>
                    <th>
                        <center>FOTOGRAFIA</center>
                    </th>
                    <th>
                        <center>Borrar</center>
                    </th>
                </tr>
                <?php
                    include("../conexionPDo.php");
                    include("../eliminarTemporales.php");
                    $dni = $_POST['dni'];
                    $nom = $_POST['nombre'];
                    $a1 = $_POST['apellido1'];
                    $a2 = $_POST['apellido2'];
                    $dir = $_POST['direccion'];
                    $cp = $_POST['cp'];
                    $pobla = $_POST['poblacion'];
                    $prnc = $_POST['provincia'];
                    $tlfn = $_POST['telefono'];
                    $email = $_POST['email'];
                    
                    $arr = [9];
                    for ($i = 0; $i < 9; $i++)
                        $arr[$i] = 0;

                    $hay = 0;

                    if (strcmp($dni,"") != 0)
                    {
                        $hay = 1;
                        $arr[0] = "DNI LIKE '$dni'";
                    }
                    if (strcmp($nom,"") != 0)
                    {
                        $hay = 1;
                        $arr[1] = "Nombre LIKE '$nom'";
                    }
                    if (strcmp($a1,"") != 0)
                    {
                        $hay = 1;
                        $arr[2] = "Apellido1 LIKE '$a1'";
                    }
                    if (strcmp($a2,"") != 0)
                    {
                        $hay = 1;
                        $arr[3] = "Apellido2 LIKE '$a2'";
                    }
                    if (strcmp($dir,"") != 0)
                    {
                        $hay = 1;
                        $arr[4] = "Direccion LIKE '$dir'";
                    }
                    if (strcmp($cp,"") != 0)
                    {
                        $hay = 1;
                        $arr[5] = "CP LIKE '$cp'";
                    }
                    if (strcmp($pobla,"") != 0)
                    {
                        $hay = 1;
                        $arr[6] = "Poblacion LIKE '$pobla'";
                    }
                    if (strcmp($prnc,"") != 0)
                    {
                        $hay = 1;
                        $arr[7] = "Provincia LIKE '$prnc'";
                    }
                    if (strcmp($tlfn,"") != 0)
                    {
                        $hay = 1;
                        $arr[8] = "Telefono LIKE '$tlfn'";
                    }
                    if (strcmp($email,"") != 0)
                    {
                        $hay = 1;
                        $arr[9] = "Email LIKE '$email'";
                    }
                    
                    //definimos la cadena de la consulta
                    if ($hay == 1)
                    {
                        $ind2 = 0;
                        $sql = "SELECT * FROM clientes WHERE ";
                        for ($i = 0; $i < 9; $i++)
                        {
                            if(strcmp($arr[$i],"0") != 0 && $ind2 == 0)
                            {
                                $sql = $sql . ' ' . $arr[$i];
                                $ind2++;
                            }elseif (strcmp($arr[$i],"0") != 0)
                            {
                                $sql = $sql .' AND '. $arr[$i];
                                $ind2++;
                            }
                        }
                        $sql = $sql .' '. "order by Id_Cliente";
                    
                    }
                    else
                        $sql = "SELECT * FROM clientes order by Id_Cliente";
                    //creamos la consulta y asignamos el resultado a la variable $result
                    $result = $conexion->query($sql);
                    $rows = $result->fetchAll();

                    //como los valores estan en un array asociatio usamos foreach para extraer los valores de $rows

                    foreach ($rows as $row) {
                        $id_cliente = $row['Id_Cliente'];
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

                        echo "<tr>
                        <td><center>$id_cliente</center></td>
                        <td><center>$dni</center></td>
                        <td><center><a href='updateCliente.php?id_cliente=$id_cliente'>$nombre</a></center></td>
                        <td><center>$apellido1</center></td>
                        <td><center>$apellido2</center></td>
                        <td><center>$direccion</center></td>
                        <td><center>$cp</center></td>
                        <td><center>$poblacion</center></td>
                        <td><center>$provincia</center></td>
                        <td><center>$telefono</center></td>
                        <td><center>$email</center></td>
                        <td><center><a href=../temporales/$imagen><img src=../temporales/$imagen width=50 border=0></a></center></td>
                        <td><center><input type='checkbox' name='borrar[]' value=$id_cliente /></center></td>
                    </tr>";
                }
                ?>
            </table>
            </br></br>
            <input type="submit" value="Eliminar Clientes Seleccionados">
            <input type="reset" value="Deseleccionar Todos">
        </form>

        <a href="anadirCliente.php"><input type="button" class="btn btn-success" value="Añadir nuevo cliente"/></a>
        <a href="../home.php"><input type="button" class="btn btn-primary" value="Volver al inicio"/></a>
        <a href="../cerrarSesion.php"><input type="button" class="btn btn-danger" value="CERRAR SESION"/></a></br>
    </body>

    </html>