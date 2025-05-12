<?php
require_once(__DIR__ . '/../../models/HabitacionModelo.php');
//session_start();

function procesarEliminar() {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $exito = eliminarHabitacion($id);
        header('Location: /habitaciones');
        exit;
    } else {
        $error = "ID no proporcionado";
        require(__DIR__ . '/../../views/Habitacion/EliminarHabitacionVista.php');
    }
}
?>
