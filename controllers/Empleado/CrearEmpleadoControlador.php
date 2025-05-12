<?php
require_once(__DIR__ . '/../../models/EmpleadoModelo.php');
//session_start();

function mostrarFormularioCrearEmpleado() {
    require(__DIR__ . '/../../views/Empleado/CrearEmpleadoVista.php');
}

function procesarFormularioCrearEmpleado() {
    $hotel_id = $_SESSION['hotel_id'];

    $nombre = $_POST['nombre'] ?? '';
    $mail = $_POST['mail'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    $puesto = $_POST['puesto'] ?? '';
    $salario = $_POST['salario'] ?? '';


    if ($nombre && $mail && $contraseña && $puesto && $salario) {
        $exito = crearEmpleado($nombre, $mail, $contraseña, $puesto, $salario, $hotel_id);
        if ($exito) {
            header('Location: /empleados');
            exit;
        } else {
            $error = "No se pudo crear el empleado (¿correo ya existe?).";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
    require(__DIR__ . '/../../views/Empleado/CrearEmpleadoVista.php');
}
?>
