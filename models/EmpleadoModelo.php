<?php
require_once(__DIR__ . '/../config/db.php');

function obtenerEmpleadoPorId($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $empleado = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $empleado;
}

function obtenerEmpleadosPorHotel($hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE hotel_id = ?");
    $stmt->bind_param('i', $hotel_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $empleado = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $empleado;
}


function crearEmpleado($nombre, $mail, $contraseña, $puesto, $salario, $hotel_id) {
    $conn = getConnection();
    try{
    $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, rol, salario, hotel_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssii', $nombre, $mail, $hash, $puesto, $salario, $hotel_id);
    $stmt->execute();
    $stmt->close();
    }catch(mysqli_sql_exception $e) {
        $conn->close();
        return false;
    }
    $conn->close();
    return true;
}


function obtenerEmpleadoPorIdYHotel($id, $hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND hotel_id = ?");
    $stmt->bind_param('ii', $id, $hotel_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $empleado = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $empleado;
}

function actualizarEmpleado($id, $nombre, $mail, $puesto, $salario, $contraseña) {
    $conn = getConnection();
    try{
        if ($contraseña) {
            $hash = password_hash($contraseña, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ?, rol = ?, salario = ? WHERE id = ?");
            $stmt->bind_param('ssssii', $nombre, $mail, $hash, $puesto, $salario, $id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, rol = ?, salario = ? WHERE id = ?");
            $stmt->bind_param('sssii', $nombre, $mail, $puesto, $salario, $id);
        }
        $exito = $stmt->execute();
        $stmt->close();
    }catch(mysqli_sql_exception $e) {
        $conn->close();
        return false;
    }
    
    $conn->close();
    return true;
}

function eliminarEmpleado($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $exito = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $exito;
}
function obtenerNumeroEmpleadosPorHotel($hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM users WHERE hotel_id = ?");
    $stmt->bind_param('i', $hotel_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result['total'] ?? 0;
}

?>
