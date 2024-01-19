<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario para Agregar Álbum</title>
    <link rel="stylesheet" href="estyle.css">
</head>
<body>

<div class="container">
    <h2>Formulario para Agregar un Álbum Nuevo</h2>

    <form action="procesar_agregar.php" method="post">
        <label for="nombre">Nombre del Álbum:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required>
        <br>

  <label for="genero">Género:</label>
    <select id="genero" name="genero" required>
        <!-- Aquí deberías cargar los géneros desde la base de datos -->
        <option value="1">Rock</option>
        <option value="2">Banda</option>
        <option value="3">Corridos</option>
        <option value="4">Pop</option>
            <!-- Opciones de género -->
        </select>
        <br>

        <!-- Otros campos -->

        <input type="submit" value="Agregar Álbum">
    </form>
</div>

</body>
</html>
