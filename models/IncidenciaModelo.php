<?php
require_once(__DIR__ . '/../config/db.php');

// Listar incidencias por hotel
// Obtiene las incidencias asignadas al rol actual
function obtenerIncidenciasDelRol($rol, $hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM incidencias WHERE departamento = ? AND hotel_id = ? AND estado != 'solucionada'");
    $stmt->bind_param('si', $rol, $hotel_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $incidencias = [];
    while ($fila = $resultado->fetch_assoc()) {
        $incidencias[] = $fila;
    }
    $stmt->close();
    $conn->close();
    return $incidencias;
}

// Obtiene incidencias que NO están asignadas al rol actual (pero son visibles)
function obtenerIncidenciasDeOtrosRoles($rol, $hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM incidencias WHERE departamento != ? AND hotel_id = ? AND estado != 'solucionada'");
    $stmt->bind_param('si', $rol, $hotel_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $incidencias = [];
    while ($fila = $resultado->fetch_assoc()) {
        $incidencias[] = $fila;
    }
    $stmt->close();
    $conn->close();
    return $incidencias;
}


// Crear incidencia
function crearIncidencia($nombre, $descripcion, $departamento, $lugar, $hotel_id, $estado = "pendiente") {
    $conn = getConnection();
    try{
        $stmt = $conn->prepare("INSERT INTO incidencias (nombre, descripcion, departamento, lugar, hotel_id, estado) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssis', $nombre, $descripcion, $departamento, $lugar, $hotel_id, $estado);
        $stmt->execute();
        $stmt->close();
    }catch(mysqli_sql_exception $e) {
        $conn->close();
        return false;
    }
    $conn->close();
    return true;
}

// Obtener incidencia por id y hotel (seguridad)
function obtenerIncidenciaPorIdYHotel($id, $hotel_id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM incidencias WHERE id = ? AND hotel_id = ?");
    $stmt->bind_param('ii', $id, $hotel_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $incidencia = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $incidencia;
}

// Actualizar estado incidencia


function actualizarEstadoIncidencia($id, $nuevo_estado) {
    $conn = getConnection();
    // 1. Obtener el estado actual
    $stmt = $conn->prepare("SELECT estado FROM incidencias WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($estado_viejo);
    $stmt->fetch();
    $stmt->close();

    // 2. Actualizar el estado de la incidencia
    $stmt = $conn->prepare("UPDATE incidencias SET estado = ? WHERE id = ?");
    $stmt->bind_param('si', $nuevo_estado, $id);
    $stmt->execute();
    $stmt->close();

    // 3. Registrar en el historial
    $usuario_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO historial_estado_incidencias 
        (incidencia_id, estado_viejo, estado_nuevo, cambiado_por) 
        VALUES (?, ?, ?, ?)");
    $stmt->bind_param('isss', $id, $estado_viejo, $nuevo_estado, $usuario_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}


// Marcar como solucionadaº
function solventarIncidencia($id) {
    return actualizarEstadoIncidencia($id, "solucionada");
}

function obtenerNumeroIncidenciasPorHotelEstadoYRol($hotel_id, $estado, $rol) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM incidencias WHERE hotel_id = ? AND estado = ? AND departamento = ?");
    $stmt->bind_param('iss', $hotel_id, $estado, $rol);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $result['total'] ?? 0;
}

function obtenerHistorialIncidencia($incidencia_id) {
    $conn = getConnection();
    $stmt = $conn->prepare(
        "SELECT h.estado_viejo, h.estado_nuevo, h.fecha_cambio, u.username, u.rol
        FROM historial_estado_incidencias as h
        LEFT JOIN users u ON h.cambiado_por = u.id
        WHERE h.incidencia_id = ?
        ORDER BY h.fecha_cambio DESC"
    );
    $stmt->bind_param('i', $incidencia_id);
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

function obtenerHistorialSolventadas($hotel_id) {
    $conn = getConnection();
    // Selecciona incidencias con su último estado "solventada"
    $sql = "SELECT i. id, i.nombre, i.departamento, i. estado, h.fecha_cambio, u.username
            FROM incidencias AS i
            JOIN historial_estado_incidencias AS h ON i.estado = h.estado_nuevo AND i.id = h.incidencia_id
            LEFT JOIN users AS u ON h.cambiado_por = u.id 
            WHERE i.estado = 'solucionada' AND i.hotel_id = ?
            ORDER BY h.fecha_cambio DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $hotel_id);
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