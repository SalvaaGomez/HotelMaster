<?php
// controllers/Habitacion/HabitacionListadoControlador.php
require_once(__DIR__ . '/../../models/HabitacionModelo.php');
//session_start();

function mostrarHabitaciones() {
    $hotel_id = $_SESSION['hotel_id'];
    $habitaciones = obtenerHabitacionesPorHotel($hotel_id);
    require(__DIR__ . '/../../views/Habitacion/HabitacionListadoVista.php');
}

function eliminarHabitacionPopup($id){
    $habitaciones = obtenerHabitacionesPorHotel($_SESSION['hotel_id']);
    $habitacion = obtenerHabitacionPorId($id);
    $mostrarPopUpEliminar = true;
    $habitacionAEliminar = [
        'id' => $habitacion['id'],
        'nombre' => $habitacion['room_name'],
    ];
    require(__DIR__ . '/../../views/Habitacion/HabitacionListadoVista.php');
}   
function asignarEstadoHabitacionPopup($id){
    $habitaciones = obtenerHabitacionesPorHotel($_SESSION['hotel_id']);
    $habitacion = obtenerHabitacionPorId($id);
    $mostrarPopUpAsignarEstado = true;
    $habitacionEstado  = [
        'id' => $habitacion['id'],
        'nombre' => $habitacion['room_name'],
        'estado' => $habitacion['status'],
    ];
    require(__DIR__ . '/../../views/Habitacion/HabitacionListadoVista.php');
}   

?>