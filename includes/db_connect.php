<?php
$servername = 'localhost';
$username = 'obuitragocamelo';
$password = 'Obc19447/*';
$dbname = "mi_proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
