<?php
//inicializamos sesion
session_start();
//incluimos la conexion con la BD
include("./conexiondb.php");
//comprobar si es autor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //usuario que recibimos por el fomulario
    $usuario = strip_tags(htmlspecialchars($_POST["usuario"], ENT_QUOTES, 'UTF-8'));
    // contraseña que recibimos por el formulario
    $password = preg_match("/^[a-zA-Z0-9]{8}$/", $_POST["clave"]);
    // sentencia de la consulta que hacemos a la BD
    $sql = "SELECT contrasenha_autor FROM autor WHERE nombre_usuario_autor = ?";
    // resultado de la consulta a la BD, como uso "?" tengo que usar prepare en vez de query
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    $resultado = $consulta->get_result();
    // Verificamos si hay resultados
    if ($resultado->num_rows === 1) {
        // el resultado es devuelto en una fila
        $fila = $resultado->fetch_assoc();

        // Verificamos la contraseña
        if ($fila["contrasenha_autor"] === $_POST["clave"]) {
            $_SESSION["autor"] = $usuario;
            header("Location: index.php");
        } else {
            // Contraseña incorrecta
            header("Location: login.php?error=contraseña_incorrecta");
        }
    } else {
        // autor no encontrado, buscamos al visitante
        $sql = "SELECT * FROM visitantes WHERE nombre_visitante = ?";
        // resultado de la consulta a la BD, como uso "?" tengo que usar prepare en vez de query
        $consulta = $conexion->prepare($sql);
        $consulta->bind_param("s", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        // Verificamos si hay resultados
        if ($resultado->num_rows === 1) {
            // el resultado es devuelto en una fila
            $fila = $resultado->fetch_assoc();

            // Verificamos la contraseña
            if ($fila["contrasenha_visitante"] === $_POST["clave"]) {
                $_SESSION["visitante"] = $usuario;
                $_SESSION["id"] = $fila["id_visitante"];
                $_SESSION["email"] = $fila["email_visitante"];
                $_SESSION["pass"] = $fila["contrasenha_visitante"];
                header("Location: index.php");
            } else {
                // Contraseña incorrecta
                header("Location: login.php?error=contraseña_incorrecta");
            }
        } else {
            // Usuario no encontrado
            header("Location: login.php?error=usuario_no_encontrado");
        }
    }
}

?>