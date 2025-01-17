<?php

include("./conexiondb.php");

$sql = "SELECT * FROM entradas";
$resultado = $conexion->query($sql);

if ($resultado->num_rows === 0) {
    echo "No hay ninguna entrada";
} else {
    echo "<div class='tabla_administrar'>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Título</th>";
    echo "<th>Contenido</th>";
    echo "<th>Fecha</th>";

    echo "</tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['id_entrada'] . "</td>";
        echo "<td>" . $fila['titulo_entrada'] . "</td>";
        echo "<td>" . substr($fila['contenido_entrada'], 0, 50) . "</td>";
        echo "<td>" . $fila['fecha_creacion_entrada'] . "</td>";
        //página edicion de entrada
        echo "<td><a href='editar_entrada.php?id=" . $fila['id_entrada'] . "'><img src='./images/editar.png' alt='Editar' style='width: 20px; height: 20px;'></a></td>";
        //eliminar entrada
        echo "<td><a href='eliminar_entrada.php?id=" . $fila['id_entrada'] . "'><img src='./images/eliminar.png' alt='Eliminar' style='width: 20px; height: 20px;'></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    $conexion->close();
}
?>