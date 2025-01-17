<div class="row masonry">
    <!-- brick-wrapper -->
    <div class="bricks-wrapper">
        <div class="grid-sizer"></div>

        <?php
        include("./conexiondb.php");

        $sql = "SELECT * FROM entradas WHERE categoria_entrada = 'musica' ORDER BY fecha_creacion_entrada DESC";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows === 0) {
            echo "No hay ninguna entrada";
        } else {
            while ($fila = $resultado->fetch_assoc()) {
                ?>
                <!-- POST CON AUDIO -->
                <article class="brick entry format-audio animate-this">
                    <div class="entry-thumb">
                        <!-- cambiar href al post-->
                        <a href="ver_post.php?id=<?php echo $fila['id_entrada'] ?>" class="thumb-link">
                            <!-- cambiar src a imagen que aparece-->
                            <img src="<?php echo $fila['imagen'] ?>" alt="concert">
                        </a>
                        <div class="audio-wrap">
                            <!-- cambiar src audio echo fila audio-->
                            <audio id="player" src="<?php echo $fila['musica'] ?>" width="100%" height="42"
                                controls="controls"></audio>
                        </div>
                    </div>
                    <div class="entry-text">
                        <div class="entry-header">
                            <div class="entry-meta">
                            </div>
                            <!-- cambiar href al post-->
                            <h1 class="entry-title"><a
                                    href="ver_post.php?id=<?php echo $fila['id_entrada'] ?>"><?php echo $fila['titulo_entrada'] ?></a>
                            </h1>
                        </div>
                        <div class="entry-excerpt">
                            <?php echo substr($fila['contenido_entrada'], 0, 150) . "..."; ?>
                        </div>
                    </div>
                </article>
                <!-- FIN POST CON AUDIO -->
                <?php
            }
        }
        ?>
    </div> <!-- end brick-wrapper -->
</div>