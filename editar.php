<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Álbum</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
include('db_config.php');

// Validar el ID del álbum
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $album_id = $_GET['id'];

    // Obtener los datos del álbum específico con consulta preparada
    $sql = "SELECT * FROM albums WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $album_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <h2>Editar Álbum</h2>
        <form action="guardar_edicion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nombre">Nombre del Álbum:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($row['name']); ?>" required><br>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" value="<?php echo htmlspecialchars($row['author']); ?>" required><br>
            <!-- Agrega más campos según tus necesidades -->
            <input type="submit" value="Guardar Cambios">
        </form>
<?php
    } else {
        echo "No se encontró el álbum.";
    }
} else {
    echo "ID de álbum no válido.";
}

$conn->close();
?>

</body>
</html>
