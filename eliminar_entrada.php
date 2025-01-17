<?php

session_start();
?>

<?php
include("./conexiondb.php");
$id_entrada = $_GET["id"];

$sql = "DELETE FROM entradas WHERE id_entrada = $id_entrada";
$resultado = $conexion->query($sql);
if ($resultado) {
    echo "Entrada eliminada con éxito";
    header("Location: administrar_blog.php");
} else {
    echo "No se ha podido eliminar la entrada";
}
?>