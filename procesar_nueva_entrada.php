<?php
//inicializamos sesion
session_start();
//incluimos la conexion con la BD
include("./conexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = htmlspecialchars($_POST["titulo"], ENT_QUOTES, 'UTF-8');
    $contenido = strip_tags($_POST["contenido"]);
    $fecha = date("Y-m-d");
    $categoria = $_POST["categoria"];
    $video = filter_var($_POST["url_video"], FILTER_SANITIZE_URL);
    $musica = $_FILES["url_musica"];
    $imagen = $_FILES["url_imagen"];

    if ($titulo !== null && $contenido !== null && $categoria !== null) {
        $musica_direccion = null;
        $imagen_direcccion = null;

        // Manejo de la imagen
        if ($imagen['error'] === UPLOAD_ERR_OK) {
            $imagen_direcccion = "./guardar_imagenes/" . basename($imagen["name"]);
            move_uploaded_file($imagen["tmp_name"], $imagen_direcccion);
        } else {
            // Manejo de errores de la imagen
            echo "Error al subir la imagen: " . $imagen['error'];
        }

        // Manejo de la música
        if ($musica['error'] === UPLOAD_ERR_OK) {
            $musica_direccion = "./guardar_musica/" . basename($musica["name"]);
            move_uploaded_file($musica["tmp_name"], $musica_direccion);
        } else {
            // Manejo de errores de la música
            echo "Error al subir la música: " . $musica['error'];
        }
        // sentencia para meter datos en la BD
        $sql = "INSERT INTO entradas(id_autor, titulo_entrada, contenido_entrada, fecha_creacion_entrada, categoria_entrada, video, musica, imagen) VALUES (1, ?, ?, ?, ?, ?, ?, ?)";

        $consulta = $conexion->prepare($sql);
        $consulta->bind_param("sssssss", $titulo, $contenido, $fecha, $categoria, $video, $musica_direccion, $imagen_direcccion);
        if ($consulta->execute() === true) {
            //echo "ENTRADA AÑADIDA CON EXITO";
            //comentando el header, puedo imprimir cosas por pantalla para comprobar que todo va bien
            header("Location: nueva_entrada.php");
            
        }
    }
}