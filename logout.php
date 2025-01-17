<?php
//inicio sesion
session_start();
//destruyo sesion
session_destroy();
// lo devuelvo a la pagina inicial
header('Location: index.php');
//salgo
exit;
?>