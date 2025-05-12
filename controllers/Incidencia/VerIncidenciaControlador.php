<?php
//session_start();
require_once(__DIR__ . '/../../models/IncidenciaModelo.php');

function mostrarDetallesIncidencia($id) {
    $hotel_id = $_SESSION['hotel_id'];
    if (!$id) {
        header('Location: /incidencias');
        exit;
    }
    $incidencia = obtenerIncidenciaPorIdYHotel($id, $hotel_id);
    $historial = obtenerHistorialIncidencia($id);

    require(__DIR__ . '/../../views/Incidencia/VerIncidenciaVista.php');
}
