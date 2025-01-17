<div class="row masonry">
    <!-- brick-wrapper -->
    <div class="bricks-wrapper">
        <div class="grid-sizer"></div>

        <?php
        include("./conexiondb.php");

        $sql = "SELECT * FROM entradas WHERE categoria_entrada = 'concierto' ORDER BY fecha_creacion_entrada DESC";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows === 0) {
            echo "No hay ninguna entrada";
        } else {
            while ($fila = $resultado->fetch_assoc()) {
                ?>
                <!-- SOLO TEXTO -->
                <article class="brick entry format-standard animate-this">
                    <div class="entry-thumb">
                        <!-- cambiar href hacia donde va cuando le pinchas a la imagen-->
                        <a href="ver_post.php?id=<?php echo $fila['id_entrada'] ?>" class="thumb-link">
                            <!-- cambiar src la imagen que se le puede meter-->
                            <img src="<?php echo $fila['imagen'] ?>" alt="building">
                        </a>
                    </div>
                    <div class="entry-text">
                        <div class="entry-header">
                            <div class="entry-meta">

                            </div>
                            <!-- cambiar href hacia donde va cuando le pinchas al titulo-->
                            <h1 class="entry-title"><a
                                    href="ver_post.php?id=<?php echo $fila['id_entrada'] ?>"><?php echo $fila['titulo_entrada'] ?></a>
                            </h1>
                        </div>
                        <div class="entry-excerpt">
                            <?php echo substr($fila['contenido_entrada'], 0, 150) . "..."; ?>
                        </div>
                    </div>
                </article>
                <!-- FIN SOLO TEXTO -->
                <?php
            }
        }
        ?>
    </div> <!-- end brick-wrapper -->
</div>