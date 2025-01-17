<?php
include("head.php");
?>

<body id="top">
    <?php
    include("header.php");
    ?>
    <section id="bricks">
        <div class="row masonry">
            <!-- brick-wrapper -->
            <div class="bricks-wrapper">
                <div class="grid-sizer"></div>

                <?php
                include("./conexiondb.php");

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $dato_buscar = strip_tags(htmlspecialchars($_POST["buscador"], ENT_QUOTES, 'UTF-8'));
                    ;

                    $sql = "SELECT * FROM entradas WHERE titulo_entrada LIKE '%$dato_buscar%'";
                    $resultado = $conexion->query($sql);
                }


                if ($resultado->num_rows === 0) {
                    echo "No hay ninguna entrada";
                } else {
                    while ($fila = $resultado->fetch_assoc()) {
                        if ($fila['categoria_entrada'] === "concierto") {
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
                        } else if ($fila['categoria_entrada'] === "musica") {
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
                        } else {
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
                }
                ?>
            </div> <!-- end brick-wrapper -->
        </div>
    </section>


    <!-- FOOTER -->
    <?php
    include("footer.php");
    ?>
    <!-- FIN FOOTER -->
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <!-- FUNCIONES JAVA SCRIPT -->
    <script src="./js/jquery-2.1.3.min.js"></script>
    <script src="./js/plugins.js"></script>
    <script src="./js/jquery.appear.js"></script>
    <script src="./js/main.js"></script>

</body>