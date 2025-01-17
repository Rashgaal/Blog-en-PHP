<div class="row masonry">
    <!-- brick-wrapper -->
    <div class="bricks-wrapper">
        <div class="grid-sizer"></div>

        <?php
        include("./conexiondb.php");

        $sql = "SELECT * FROM entradas WHERE categoria_entrada = 'video' ORDER BY fecha_creacion_entrada DESC";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows === 0) {
            echo "No hay ninguna entrada";
        } else {
            while ($fila = $resultado->fetch_assoc()) {
                ?>
                <!-- POST CON VIDEO -->
                <article class="brick entry format-video animate-this">
                    <div class="entry-thumb video-image">
                        <a href="<?php echo $fila['video'] ?>" data-lity>
                            <!-- cambiar href a la imagen que aparece-->
                            <img src="<?php echo $fila['imagen'] ?>" alt="bokeh">
                        </a>
                    </div>
                    <div class="entry-text">
                        <div class="entry-header">
                            <div class="entry-meta">
                            </div>
                            <!-- cambiar href a la pagina del post-->
                            <h1 class="entry-title"><a
                                    href="ver_post.php?id=<?php echo $fila['id_entrada'] ?>"><?php echo $fila['titulo_entrada'] ?></a>
                            </h1>
                        </div>
                        <div class="entry-excerpt">
                            <?php echo substr($fila['contenido_entrada'], 0, 150) . "..."; ?>
                        </div>
                    </div>
                </article>
                <!-- FIN POST CON VIDEO -->
                <?php
            }
        }
        ?>
    </div> <!-- end brick-wrapper -->
</div>