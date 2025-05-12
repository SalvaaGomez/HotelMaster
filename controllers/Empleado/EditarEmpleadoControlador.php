<?php
require_once(__DIR__ . '/../../models/EmpleadoModelo.php');
//session_start();

function mostrarFormularioEditarEmpleado($id) {

    if (!$id) {
        header('Location: /empleados');
        exit;
    }
    $empleado = obtenerEmpleadoPorId($id);
    require(__DIR__ . '/../../views/Empleado/EditarEmpleadoVista.php');
}

function procesarFormularioEditarEmpleado() {
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $mail = $_POST['mail'] ?? '';
    $puesto = $_POST['puesto'] ?? '';
    $salario = $_POST['salario'] ?? '';
    $contraseña = $_POST['contraseña'] ?? null;

    if ($id && $nombre && $mail && $puesto ) {
        $exito = actualizarEmpleado($id, $nombre, $mail, $puesto, $salario, $contraseña);
        if ($exito) {
            header('Location: /empleados');
            exit;
        } else {
            $error = "No se pudo actualizar el empleado.";
        }
    } else {
        $error = "Todos los campos (excepto contraseña) son obligatorios.";
    }
    $empleado = obtenerEmpleadoPorIdYHotel($id, $_SESSION['hotel_id']);
    if (!$empleado) {
        header('Location: /empleados');
        exit;
    }
        require(__DIR__ . '/../../views/Empleado/EditarEmpleadoVista.php');
}
?>
