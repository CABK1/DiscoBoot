<?php
include('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['autor'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $autor = $_POST['autor'];

        $sql = "UPDATE albums SET name = ?, author = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $autor, $id);
        
        if ($stmt->execute()) {
            header('Location: index.php');
            exit(); 
        } else {
            echo "Error al actualizar los datos: " . $conn->error;
        }
    } else {
        echo "Datos del formulario incompletos.";
    }
} else {
    echo "Acceso incorrecto al archivo.";
}

$conn->close();
?>