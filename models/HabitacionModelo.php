<?php
require_once(__DIR__ . '/../config/db.php');

function obtenerTodasLasHabitaciones() {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM habitaciones");
    $stmt->execute();
    $result = $stmt->get_result();
    $habitaciones = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $habitaciones;
}

function obtenerHabitacionesPorHotel($hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM habitaciones WHERE hotel_id = ?");
    $stmt->bind_param('i', $hotel_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $habitaciones = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();
    return $habitaciones;
}

function crearHabitacion($nombre, $tipo, $precio, $hotel_id) {
    $conn = getConnection();
    try{
        $stmt = $conn->prepare("INSERT INTO habitaciones (hotel_id, room_name, room_type, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('issd', $hotel_id, $nombre, $tipo, $precio);
        $exito = $stmt->execute();
        $stmt->close();
    }catch(mysqli_sql_exception $e) {
        $conn->close();
        return false;
    }
    $conn->close();
    return true;
}

function obtenerHabitacionPorId($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM habitaciones WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $habitacion = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $habitacion;
}
function actualizarHabitacion($id, $nombre, $tipo, $precio) {
    $conn = getConnection();
    try{
        $stmt = $conn->prepare("UPDATE habitaciones SET room_name = ?, room_type = ? , price = ? WHERE id = ?");
        $stmt->bind_param('ssdi', $nombre, $tipo, $precio, $id);
        $exito = $stmt->execute();
        $stmt->close();
    }catch(mysqli_sql_exception $e) {
        $conn->close();
        return false;
    }
    $conn->close();
    return true;
}

function eliminarHabitacion($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("DELETE FROM habitaciones WHERE id = ?");
    $stmt->bind_param('i', $id);
    $exito = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $exito;
}
function obtenerNumeroHabitacionesPorHotel($hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM habitaciones WHERE hotel_id = ?");
    $stmt->bind_param('i', $hotel_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result['total'] ?? 0;
}
function actualizarEstadoHabitacionPorIdYHotel($id, $hotel_id, $nuevo_estado) {
    $conn = getConnection();
    
    // 1. Obtener estado actual
    $stmt = $conn->prepare("SELECT status FROM habitaciones WHERE id = ? AND hotel_id = ?");
    $stmt->bind_param('ii', $id, $hotel_id);
    $stmt->execute();
    $stmt->bind_result($estado_viejo);
    $stmt->fetch();
    $stmt->close();

    // 2. Actualizar el estado de la habitación
    $stmt = $conn->prepare("UPDATE habitaciones SET status = ? WHERE id = ? AND hotel_id = ?");
    $stmt->bind_param('sii', $nuevo_estado, $id, $hotel_id);
    $stmt->execute();
    $stmt->close();

    // 3. Insertar en el historial
    $usuario_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO historial_estado_habitacion 
        (habitacion_id, estado_viejo, estado_nuevo, cambiado_por) 
        VALUES (?, ?, ?, ?)");
    $stmt->bind_param('isss', $id, $estado_viejo, $nuevo_estado, $usuario_id);
    $stmt->execute();
    $stmt->close();
    
    $conn->close();
}

function obtenerHistorialHabitacion($habitacion_id) {
    $conn = getConnection();
    $stmt = $conn->prepare(
        "SELECT h.estado_viejo, h.estado_nuevo, h.fecha_cambio, u.username, u.rol
        FROM historial_estado_habitacion h
        LEFT JOIN users u ON h.cambiado_por = u.id
        WHERE h.habitacion_id = ?
        ORDER BY h.fecha_cambio DESC"
    );
    $stmt->bind_param('i', $habitacion_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $historial = [];
    while ($fila = $resultado->fetch_assoc()) {
        $historial[] = $fila;
    }
    $stmt->close();
    $conn->close();
    return $historial;
}

?>
