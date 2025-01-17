<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_emusic";

// Sentencia para conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
//mensaje  de comprobacion de que la conexion se ha efectuado
//echo "Conexión exitosa";

?>