<?php
$servername = "localhost";
$username = "id19554606_carrera";
$password = "Carrera#123";
$dbname = "id19554606_web2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
