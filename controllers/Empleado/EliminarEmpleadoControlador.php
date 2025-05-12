<?php
require_once(__DIR__ . '/../../models/EmpleadoModelo.php');
//session_start();


function procesarEliminarEmpleado() {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $exito = eliminarEmpleado($id);
        header('Location: /empleados');
        exit;
    } else {
        $error = "ID no proporcionado";
        require(__DIR__ . '/../../views/Empleado/EliminarEmpleadoVista.php');
    }
}
?>
