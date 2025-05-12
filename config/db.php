<?php
// db.php
function getConnection() {
    $host = ''; # Host del servidor
    $dbname = ''; # Nombre de la base de datos
    $username = ''; # Usuario de la base de datos
    $password = ''; # Contraseña de la base de datos
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
}
?>