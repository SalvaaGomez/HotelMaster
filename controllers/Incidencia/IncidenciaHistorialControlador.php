<?php
require_once(__DIR__ . '/../../models/IncidenciaModelo.php');
//session_start();

function mostrarHistorialGlobalIncidencias() {
    $hotel_id = $_SESSION['hotel_id'];
    $historial = obtenerHistorialSolventadas($hotel_id);
    require(__DIR__ . '/../../views/Incidencia/IncidenciaHistorialVista.php');
}

?>