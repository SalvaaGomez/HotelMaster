<?php
require_once(__DIR__ . '/../../models/HabitacionModelo.php');
//session_start();


function confirmarAsignarEstadoHabitacion(){
    $id = $_POST['id'] ?? null;
    $nuevoEstado = $_POST['nuevo_estado'] ?? '';
    $habitacion = obtenerHabitacionPorId($id);

    if ($id && $nuevoEstado) {
        if ($habitacion['status'] === $nuevoEstado) {
            $error = "El estado seleccionado ya es el actual.";


            $habitaciones = obtenerHabitacionesPorHotel($_SESSION['hotel_id']);
            $mostrarPopUpAsignarEstado = true;
            $habitacionEstado  = [
                'id' => $habitacion['id'],
                'nombre' => $habitacion['room_name'],
                'estado' => $habitacion['status'],
            ];
            require(__DIR__ . '/../../views/Habitacion/HabitacionListadoVista.php');

            return;
        }
        actualizarEstadoHabitacionPorIdYHotel($_POST['id'], $_SESSION['hotel_id'], $_POST['nuevo_estado']);
    }
    header("Location: habitaciones");
    exit();
}
?>
