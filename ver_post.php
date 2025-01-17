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
    <section id="content-wrap" class="blog-single">

        <?php
        include("mostrar_post.php");
        ?>

        <?php
        include("comentarios.php");
        ?>
    </section>
    <!-- FOOTER -->
    <?php
    include("footer.php");
    ?>
    <!-- FIN FOOTER -->
</body>
<!-- FIN BODY -->

</html>