<?php
//inicializamos sesion
session_start();
//incluimos la conexion con la BD
include("./conexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $visitante = strip_tags(htmlspecialchars($_POST["nombre_visitante"], ENT_QUOTES, 'UTF-8'));
    $email = filter_var($_POST["email_visitante"], FILTER_VALIDATE_EMAIL);
    $password = preg_match("/^[a-zA-Z0-9]{8}$/", $_POST["contrasenha_visitante"]);
    // sentencia para meter datos en la BD
    $sql = "INSERT INTO visitantes(nombre_visitante, email_visitante, contrasenha_visitante) VALUES (?, ?, ?)";

    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("sss", $visitante, $email, $password);
    if ($consulta->execute() === true) {
        //echo "USUARIO AÑADIDO CON EXITO";
        header("Location: index.php");
    }

}