<div class="row">
    <nav class="pagination">
        <a href="index.php?pagina=<?php echo $anterior; ?>" class="page-numbers prev">Anterior</a>
        <?php for ($i = 1; $i <= $totalPaginas; $i++) {
            ?>
            <a href="index.php?pagina=<?php echo $i; ?>" class="page-numbers <?php if ($paginaActual == $i) {
                   echo "active";
               } else {
                   echo "inactive";
               } ?> "><?php echo $i; ?></a>
            <?php
        }
        ?>
        <a href="index.php?pagina=<?php echo $siguiente; ?>" class="page-numbers next">Siguiente</a>
    </nav>

</div>

<span class="page-numbers">1</span>