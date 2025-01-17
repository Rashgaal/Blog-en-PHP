<?php
session_start();
?>

<!DOCTYPE html>

<html class="no-js" lang="en">
<!-- HEAD -->
<?php
include("head.php");
?>
<!-- FIN HEAD -->

<!-- BODY -->

<body>
    <?php
    include("header.php");
    ?>
    <?php
    if (isset($_SESSION["autor"])) {
        header("Location: index.php");
    }
    ?>
    <div class="centrar_formulario">
        <form action="procesar_log_in.php" method="post">
            <label for="autor">Usuario</label>
            <input type="text" name="usuario" id="usuario">
            <br>
            <label for="clave">Constraseña</label>
            <input type="password" name="clave" id="clave">
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
    <!-- FOOTER -->
    <?php
    include("footer.php");
    ?>
    <!-- FIN FOOTER -->
</body>
<!-- FIN BODY -->

</html>