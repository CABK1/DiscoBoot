<?php

if(isset($_GET['id'])) {
    // Conectar a la base de datos 
    include('db_config.php');

    $album_id = $_GET['id'];

    $sql = "DELETE FROM albums WHERE id = $album_id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Álbum eliminado correctamente.";
    } else {
        echo "Error al eliminar el álbum: " . $conn->error;
    }
    echo "<script>";
    echo "location.replace('index.php')";
    echo "</script>";

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "ID de álbum no proporcionado.";
}
?>
