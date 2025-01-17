<div class="comments-wrap">
    <div id="comments" class="row">
        <div class="col-full">
            <?php
            include("./conexiondb.php");
            $id_entrada = $_GET["id"];

            $sql = "SELECT nombre_visitante, contenido_comentario FROM comentarios LEFT JOIN visitantes ON comentarios.id_visitante = visitantes.id_visitante WHERE id_entrada = $id_entrada ORDER BY fecha_comentario";
            $resultado = $conexion->query($sql);
            if ($resultado->num_rows === 0) {
                //echo "No hay comentarios en este momento.";S
            } else {
                ?>
                <h3>Comentarios</h3>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    $nombre_usuario = $fila["nombre_visitante"];
                    $contenido_comentario = $fila["contenido_comentario"];
                    ?>


                    <!-- commentlist -->
                    <ol class="commentlist">
                        <li class="depth-1">
                            <div class="comment-content">
                                <div class="comment-info">
                                    <cite><?php echo $nombre_usuario; ?></cite>
                                </div>
                                <div class="comment-text">
                                    <p><?php echo $contenido_comentario; ?></p>
                                </div>
                            </div>
                        </li>
                    </ol> <!-- Commentlist End -->
                    <?php
                }
            }
            ?>

            <?php
            if (isset($_SESSION["visitante"]) || isset($_SESSION["autor"])) {
                include("dejar_comentario.php");
            } else {
                ?>
                <p>Suscríbete <a href="#suscribirse" class="smoothscroll" title="Suscribirse">aquí</a> para dejar tu
                    comentario</p>
                <?php
            }
            ?>
        </div> <!-- end col-full -->
    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->