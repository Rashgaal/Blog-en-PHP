<!-- respond -->

<div class="respond">
    <?php $id_entrada = $_GET["id"]; ?>
    <h3>Deja tu comentario</h3>

    <form action="procesar_comentario.php" method="post" id="comentar">
        <fieldset>
            <input type="hidden" name="id_entrada" value="<?php echo $id_entrada; ?>">
            <textarea name="comentario" id="comentario" class="full-width"
                placeholder="Escribe tu comentario" required></textarea>
            <input type="submit" value="Comentar">
        </fieldset>
    </form> <!-- Form End -->

</div> <!-- Respond End -->