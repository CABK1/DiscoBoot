<?php
// procesar_agregar.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];

    include('db_config.php'); 

    $sql = "INSERT INTO albums (name, author, genre_id) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $nombre, $autor, $genero);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al agregar el álbum: " . $stmt->error;
    }

    // Cerrar la conexión y liberar recursos
    $stmt->close();
    $conn->close();
}
?>
