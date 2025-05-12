<?php
require_once(__DIR__ . '/../../models/HabitacionModelo.php');
//session_start();

function mostrarFormularioEditar($id) {
    if (!$id) {
        header('Location: /habitaciones');
        exit;
    }
    $habitacion = obtenerHabitacionPorId($id);
    require(__DIR__ . '/../../views/Habitacion/EditarHabitacionVista.php');
}

function procesarFormularioEditar() {
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $precio = $_POST['precio'] ?? '';

    if ($id && $nombre && $precio && $tipo) {
        $exito = actualizarHabitacion($id, $nombre, $tipo, $precio);
        if ($exito) {
            header('Location: /habitaciones');
            exit;
        } else {
            $error = "No se pudo actualizar la habitación.";
        }
    } else {
        $error = "Faltan datos obligatorios.";
    }
    // Volver a mostrar el formulario con mensaje de error
    $habitacion = obtenerHabitacionPorId($id);
    require(__DIR__ . '/../../views/Habitacion/EditarHabitacionVista.php');
}
?>
