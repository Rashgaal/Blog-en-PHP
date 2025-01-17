<footer>

    <div class="footer-main">

        <div class="row">

            <div class="col-four tab-full mob-full footer-info">

                <h4>Sobre nosotros</h4>

                <p>
                    Explora el vibrante mundo de la música electrónica donde los beats pulsantes y
                    las melodías hipnóticas se entrelazan. Desde los últimos lanzamientos hasta los
                    festivales más emocionantes, nuestro blog te sumergirá en la cultura electrónica.
                    Conoce a los artistas emergentes y a los íconos del género mientras compartimos
                    reseñas y tendencias. Únete a nosotros en este viaje sonoro lleno de energía y creatividad.
                </p>

            </div> <!-- end footer-info -->

            <div class="col-two tab-1-3 mob-1-2 site-links">

                <h4>Enlaces del sitio</h4>

                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Preguntas Frequentes</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                    <li><a href="#">Política de Cookies</a></li>
                </ul>

            </div> <!-- end site-links -->

            <div class="col-two tab-1-3 mob-1-2 social-links">

                <h4>Redes Sociales</h4>

                <ul>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">TikTok</a></li>
                </ul>

            </div> <!-- end social links -->
            <?php
            if (isset($_SESSION["autor"])) {
                ?>
                <div class="col-two tab-1-3 mob-1-2 social-links">

                    <h4>Perfil</h4>

                    <ul>
                        <li><a href="administrar.php">Administración</a></li>
                        <li><a href="nueva_entrada.php">Nueva Entrada</a></li>
                    </ul>

                </div>

                <?php
            } else if (isset($_SESSION["visitante"])) {
                ?>
                    <div class="col-two tab-1-3 mob-1-2 social-links">

                        <h4>Perfil</h4>

                        <ul>
                            <li><a href="perfil.php">Ir a mi perfil</a></li>
                        </ul>

                    </div>
                <?php
            } else {
                ?>
                    <div class="col-four tab-1-3 mob-full footer-subscribe">

                        <h4>Suscríbete</h4>

                    <?php include("formulario_footer.php") ?>

                    </div> <!-- end subscribe -->
                <?php
            }
            ?>


        </div> <!-- end row -->

    </div> <!-- end footer-main -->

    <div class="footer-bottom">
        <div class="row">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright Rashgaal 2024</span>
                    <span>Design by <a href="https://www.instagram.com/quino_heartless">Rashgaal</a> & <a
                            href="https://es.linkedin.com/in/fpalacioschaves">Paco Palacios</a></span>
                </div>

                <div id="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
                </div>
            </div>

        </div>
    </div> <!-- end footer-bottom -->

</footer>