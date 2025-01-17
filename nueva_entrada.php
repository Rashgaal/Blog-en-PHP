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
<?php
include("header.php");
?>

<body>
    <div class="centrar_formulario_editar">
        <form action="procesar_nueva_entrada.php" method="post" id="nueva_entrada" enctype="multipart/form-data">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" required>
            <br>
            <label for="contenido">Contenido</label>
            <textarea name="contenido" id="contenido" rows="10" cols="50" required></textarea>
            <br>
            <label>Categoría</label>
            <div class="al_lado">
                <label for="concierto">Concierto
                    <input type="radio" name="categoria" id="categoria" value="concierto" checked>
                </label>
            </div>
            <div class="al_lado">
                <label for="video">Video
                    <input type="radio" name="categoria" id="categoria" value="video">
                </label>
            </div>
            <div class="al_lado">
                <label for="musica">Música
                    <input type="radio" name="categoria" id="categoria" value="musica">
                </label>
            </div>

            <br><br>
            <label for="url_video">URL video</label>
            <input type="text" name="url_video" id="url_video" placeholder="URL del video">
            <br>
            <label for="url_musica">Canción</label>
            <input type="file" name="url_musica" id="url_musica">
            <br>
            <label for="url_imagen" >Imagen</label>
            <input type="file" name="url_imagen" id="url_imagen" required>
            <br>
            <input type="submit" value="Subir Entrada">
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