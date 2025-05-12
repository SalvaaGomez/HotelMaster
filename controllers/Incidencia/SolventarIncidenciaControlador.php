<?php
//session_start();
require_once(__DIR__ . '/../../models/IncidenciaModelo.php');

function mostrarConfirmacionSolventarIncidencia($id) {
    $hotel_id = $_SESSION['hotel_id'];
    if (!$id) {
        header('Location: /incidencias');
        exit;
    }
    $incidencia = obtenerIncidenciaPorIdYHotel($id, $hotel_id);
    require(__DIR__ . '/../../views/Incidencia/SolventarIncidenciaVista.php');
}

function procesarSolventarIncidencia() {
    $hotel_id = $_SESSION['hotel_id'];
    $id = $_POST['id'] ?? null;
    if ($id) {
        solventarIncidencia($id);
        header('Location: /incidencias');
        exit;
    } else {
        $error = "ID no proporcionado";
        $incidencia = obtenerIncidenciaPorIdYHotel($id, $hotel_id);
        require(__DIR__ . '/../../views/Incidencia/SolventarIncidenciaVista.php');
    }
}
