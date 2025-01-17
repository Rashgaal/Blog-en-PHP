
<header class="short-header">

    <div class="gradient-block"></div>

    <div class="row header-content">

        <div class="logo">
            <a href="index.php">E-Music</a>
        </div>

        <nav id="main-nav-wrap">
            <ul class="main-navigation sf-menu">
                <li><a href="musica.php" title="Música">Música</a></li>
                <li><a href="videos.php" title="Videos">Videos</a></li>
                <li><a href="conciertos.php" title="Conciertos">Conciertos</a></li>
                <?php
                if (isset($_SESSION["autor"])) {
                    ?>
                    <li><a href="administrar_blog.php">Administrar</a></li>
                    <li><a href="nueva_entrada.php">Nueva Entrada</a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <?php
                } else if(isset($_SESSION["visitante"])) {
                    ?>
                    <li><a href="perfil.php">Mi perfil</a></li>
                    <li><a href="logout.php">Log out</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="#suscribirse" class="smoothscroll" title="Suscribirse">Suscribirse</a></li>
                    <li><a href="login.php">Log In</a></li>
                    <?php
                }
                ?>
            </ul>
        </nav> <!-- end main-nav-wrap -->

        <div class="search-wrap">

            <form role="search" method="post" class="search-form" placeholder="Buscar por titulo:" action="mostrar_resultado_buscador.php">
                <label>
                    <span class="hide-content">Buscar por titulo:</span>
                    <input type="search" class="search-field" placeholder="Buscar por titulo:" id="buscador" name="buscador"
                        title="Buscar por titulo:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#" id="close-search" class="close-btn">Close</a>

        </div> <!-- end search wrap -->

        <div class="triggers">
            <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
            <a class="menu-toggle" href="#"><span>Menu</span></a>
        </div> <!-- end triggers -->

    </div>

</header>