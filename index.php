<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PROYECTO FINAL</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script>
        function toggleAgregarColumn() {
            var tabla = document.getElementById("albumTable");
            var columnas = tabla.getElementsByTagName("td");
            var mostrar = columnas[6].style.display === "none";

            for (var i = 0; i < columnas.length; i += 7) {
                columnas[i].style.display = mostrar ? "" : "none";
            }
        }

        function agregarAlbum() {
           
            window.location.href = "formulario_agregar.php";
        }
    </script>
</head>
<body class="container">


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="row justify-content-center mb-4">
        <h2 class="mt-4 mb-4">"Musica"</h2>
        <div class="row justify-content-center mb-4">
        <h3 class="mb-4">Alumno: Carrera Bustamante Kevin</h3>
        <div class="row justify-content-center mb-4">
        <button class="btn btn-primary mb-4" onclick="agregarAlbum()">Agregar Nuevo Album</button>

        <?php
        include('db_config.php');

        // Obtener datos de la base de datos
        $sql = "SELECT albums.id, albums.name AS album_name, albums.author, genres.name AS genre_name 
                FROM albums 
                JOIN genres ON albums.genre_id = genres.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table id='albumTable' class='table'>";
            echo "<thead><tr><th>ID</th><th>Nombre del Álbum</th><th>Autor</th><th>Género</th><th>Modificar</th><th>Eliminar</th><th style='display:none;'>Agregar</th></tr></thead><tbody>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["album_name"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["genre_name"] . "</td>";
                
                
                echo "<td><a class='btn btn-info btn-sm' href='editar.php?id=" . $row["id"] . "'>Editar</a></td>";
                
                
                echo "<td><a class='btn btn-danger btn-sm' href='eliminar.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este álbum?\")'>Eliminar</a></td>";
            
                echo "<td style='display:none;'><a class='btn btn-success btn-sm' href='agregar.php'>Agregar</a></td>";
                
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p class='alert alert-warning'>No se encontraron resultados.</p>";
        }

        $conn->close();
        ?>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
