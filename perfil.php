<?php
session_start();
?>
<!DOCTYPE html>

<html class="no-js" lang="en">
<!-- HEAD -->
<?php
include("head.php")
    ?>
<!-- FIN HEAD -->

<!-- BODY -->

<body>
    <?php
    include("header.php");
    ?>
    <?php
    if (isset($_SESSION["visitante"])) {
        ?>
        <div class="centrar_mi_perfil">
            <h1>Bienvenido a E-Music <?php echo $_SESSION["visitante"] ?>!</h1>
            <p>Tu número de usuario es: <?php echo $_SESSION["id"] ?></p>
            <p>Tu e-mail es: <?php echo $_SESSION["email"] ?></p>
            <p>Tu contraseña es: <?php echo $_SESSION["pass"] ?></p>
        </div>
        <?php
    }
    ?>

    <!-- FOOTER -->
    <?php
    include("footer.php");
    ?>
    <!-- FIN FOOTER -->
</body>
<!-- FIN BODY -->

</html>