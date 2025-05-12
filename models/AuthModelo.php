<?php
require_once(__DIR__ . '/../config/db.php');

function crearHotelYGerente($nombreHotel, $nombre, $mail, $contraseña) {
    $conn = getConnection();

    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $rol = 'gerente';
    try{
        $stmt2 = $conn->prepare("INSERT INTO users (username, email, password, rol, hotel_id) VALUES (?, ?, ?, ?, ?)");
        $stmt2->bind_param('ssssi', $nombre, $mail, $hash, $rol, $hotel_id);
        $stmt2->execute();
        $stmt2->close();

        $stmt = $conn->prepare("INSERT INTO hotel (hotel_name) VALUES (?)");
        $stmt->bind_param('s', $nombreHotel);
        $stmt->execute();
        $hotel_id = $stmt->insert_id;
        $stmt->close();

        $stmt3 = $conn->prepare("UPDATE users SET hotel_id = ? WHERE email = ?");
        $stmt3->bind_param('is', $hotel_id, $mail);
        $stmt3->execute();
        $hotel_id = $stmt3->insert_id;
        $stmt3->close();

    }catch (mysqli_sql_exception $e) {
        $conn->close();
        return false;
    }

    $conn->close();
    return true;
}

function autenticarUsuario($mail, $contraseña) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    if ($usuario && password_verify($contraseña, $usuario['password'])) {
        return $usuario;
    }
    return false;
}
?>