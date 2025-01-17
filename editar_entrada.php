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
<?php
include("./conexiondb.php");
$id_entrada = $_GET["id"];

$sql = "SELECT * FROM entradas WHERE id_entrada = $id_entrada";
$resultado = $conexion->query($sql);
if ($resultado->num_rows === 0) {
    echo "No se ha encontrado la entrada";
} else {
    $info_entrada = $resultado->fetch_assoc();
    $titulo = $info_entrada["titulo_entrada"];
    $contenido = $info_entrada["contenido_entrada"];
    $categoria = $info_entrada["categoria_entrada"];
    $video = $info_entrada["video"];
    $musica = $info_entrada["musica"];
    $imagen = $info_entrada["imagen"];
}
?>

<body>
    <div class="centrar_formulario_editar">


        <form action="procesar_edicion_entrada.php" method="post" id="editar_entrada" enctype="multipart/form-data">
            <input type="hidden" name="id_entrada" value="<?php echo $id_entrada; ?>">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" required value="<?php echo $titulo; ?>">
            <br>
            <label for="contenido">Contenido</label>
            <textarea name="contenido" id="contenido" rows="10" cols="50" required><?php echo $contenido; ?></textarea>
            <br>
            <label>Categoría</label>
            <div class="al_lado">
                <label for="concierto">Concierto
                    <input type="radio" name="categoria" id="concierto" value="concierto" <?php if ($categoria === 'concierto')
                        echo 'checked'; ?>>
                </label>
            </div>
            <div class="al_lado">
                <label for="video">Video
                    <input type="radio" name="categoria" id="video" value="video" <?php if ($categoria === 'video')
                        echo 'checked'; ?>>
                </label>
            </div>
            <div class="al_lado">
                <label for="musica">Música
                    <input type="radio" name="categoria" id="musica" value="musica" <?php if ($categoria === 'musica')
                        echo 'checked'; ?>>
                </label>
            </div>

            <br><br>
            <label for="url_video">URL video</label>
            <input type="text" name="url_video" id="url_video" placeholder="URL del video"
                value="<?php echo $video; ?>">
            <br>
            <label for="url_musica">Canción</label>
            <input type="file" name="url_musica" id="url_musica" value="<?php echo $musica; ?>">
            <br>
            <label for="url_imagen">Imagen</label>
            <input type="file" name="url_imagen" id="url_imagen" required>
            <br>
            <input type="submit" value="Terminar Edición">
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