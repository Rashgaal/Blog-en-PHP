<div class="row">
    <div class="col-twelve">
        <article class="format-standard">
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

            <?php
            if ($categoria === "concierto") {
                ?>
                <div class="content-media">
                    <div class="post-thumb">
                        <img src="<?php echo $imagen; ?>">
                    </div>
                </div>
                <div class="primary-content">
                    <h1 class="page-title"><?php echo $titulo; ?></h1>
                    <p class="lead"><?php echo $contenido; ?></p>
                </div> <!-- end entry-primary -->
                <?php
            } else if ($categoria === "video") {
                ?>
                    <div class="content-media">
                        <div class="post-thumb">
                            <img src="<?php echo $imagen; ?>">
                        </div>
                    </div>
                    <div class="primary-content">
                        <h1 class="page-title"><?php echo $titulo; ?></h1>
                        <p class="lead"><?php echo $contenido; ?></p>
                        <p><a href="<?php echo $video ?>" data-lity>Ver video</a></p>
                    </div> <!-- end entry-primary -->
                <?php
            } else {
                ?>
                    <div class="content-media">
                        <div class="post-thumb">
                            <img src="<?php echo $imagen; ?>">
                        </div>
                    </div>
                    <div class="primary-content">
                        <h1 class="page-title"><?php echo $titulo; ?></h1>
                        <p class="lead"><?php echo $contenido; ?></p>
                        <div class="audio-wrap">
                            <audio id="player" src="<?php echo $musica ?>" width="100%" height="42" controls="controls"></audio>
                        </div>
                    </div> <!-- end entry-primary -->
                <?php
            }
            ?>
        </article>
    </div> <!-- end col-twelve -->
</div> <!-- end row -->