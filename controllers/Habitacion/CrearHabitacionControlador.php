<?php
require_once(__DIR__ . '/../../models/HabitacionModelo.php');
//session_start();

function mostrarFormularioCrear() {
    require(__DIR__ . '/../../views/Habitacion/CrearHabitacionVista.php');
}

function procesarFormularioCrear() {
    $nombre = $_POST['nombre'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $hotel_id = $_SESSION['hotel_id'];

    if (!empty($nombre) && !empty($tipo) && !empty($precio)) {
        $exito = crearHabitacion($nombre, $tipo, $precio, $hotel_id);
        if ($exito) {
            header('Location: /habitaciones');
            exit;
        } else {
            $error = "No se pudo crear la habitación (¿nombre duplicado?).";
        }
    } else {
        $error = "Faltan datos obligatorios.";
    }
    require(__DIR__ . '/../../views/Habitacion/CrearHabitacionVista.php');
}
?>