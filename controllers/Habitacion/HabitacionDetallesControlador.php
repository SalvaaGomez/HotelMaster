<?php
require_once(__DIR__ . '/../../models/HabitacionModelo.php');
//session_start();

function mostrarDetallesHabitacion($id) {
    $habitacion = obtenerHabitacionPorId($id);
    $historial = obtenerHistorialHabitacion($id);
    require(__DIR__ . '/../../views/Habitacion/HabitacionDetallesVista.php');
}

?>