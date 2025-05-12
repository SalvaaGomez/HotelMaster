<?php
//session_start();
require_once(__DIR__ . '/../../models/IncidenciaModelo.php');

function mostrarFormularioAsignarEstadoIncidencia($id) {
    $hotel_id = $_SESSION['hotel_id'];
    if (!$id) {
        header('Location: /incidencias');
        exit;
    }
    $incidencia = obtenerIncidenciaPorIdYHotel($id, $hotel_id);
    if (!$incidencia) {
        header('Location: /incidencias');
        exit;
    }
    require(__DIR__ . '/../../views/Incidencia/AsignarEstadoIncidenciaVista.php');
}

function procesarFormularioAsignarEstadoIncidencia() {
    $hotel_id = $_SESSION['hotel_id'];
    $id = $_POST['id'] ?? null;
    $nuevoEstado = $_POST['estado'] ?? '';
    $incidencia = obtenerIncidenciaPorIdYHotel($id, $hotel_id);
    if ($id && $nuevoEstado) {
        if ($incidencia['estado'] === $nuevoEstado) {
            $error = "El estado seleccionado ya es el actual.";
            require(__DIR__ . '/../../views/Incidencia/AsignarEstadoIncidenciaVista.php');

            return;
        }

    
        actualizarEstadoIncidencia($id, $nuevoEstado);
        header('Location: /incidencias');
        exit;

    } else {
        $error = "Todos los campos son obligatorios.";
    }
    $incidencia = obtenerIncidenciaPorIdYHotel($id, $hotel_id);
    require(__DIR__ . '/../../views/Incidencia/AsignarEstadoIncidenciaVista.php');
}
