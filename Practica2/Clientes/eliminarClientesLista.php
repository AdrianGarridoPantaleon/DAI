<?php
include("../conexionPDo.php");
include("../control.php");

$array_borrados = $_POST['borrar'];
$error =0;

for($i=0; $i<count($array_borrados); $i++)
{
    $SentenciaSQL = "Delete from clientes where Id_Cliente='$array_borrados[$i]'";
    $result = $conexion->query($SentenciaSQL);

    if(!$result)
        $error=1;
}   
if($error==0)
{
    echo "<head><link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css'
    integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    <link rel='stylesheet' href='style.css' /></head></br></br><h2>El Cliente se ha eliminado correctamente.</h2><br/>
    <a href='../home.php'><input type='button' class='btn btn-primary' value='Volver al inicio'/></a>
    <a href='filtro.php'><input type='button' class='btn btn-success' value='Volver al listado clientes'/></a>
    <a href='../cerrarSesion.php'><input type='button' class='btn btn-danger' value='CERRAR SESION'/></a></br>";
}
?>