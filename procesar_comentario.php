<?php
//inicializamos sesion
session_start();
//incluimos la conexion con la BD
include("./conexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentario = strip_tags(htmlspecialchars($_POST["comentario"], ENT_QUOTES, 'UTF-8'));
    $fecha_comentario = date("Y-m-d");
    $id_visitante = $_SESSION["id"];
    $id_entrada = $_POST["id_entrada"];

    if (!empty($comentario)) {

        // sentencia para meter datos en la BD
        $sql = "INSERT INTO comentarios (id_entrada, id_visitante, contenido_comentario, fecha_comentario) VALUES (?, ?, ?, ?)";

        $consulta = $conexion->prepare($sql);
        $consulta->bind_param("iiss", $id_entrada, $id_visitante, $comentario, $fecha_comentario);
        if ($consulta->execute() === true) {
            //echo "ENTRADA EDITADA CON EXITO";
            header("Location: ver_post.php?id=$id_entrada");
        }
    }
}

?>