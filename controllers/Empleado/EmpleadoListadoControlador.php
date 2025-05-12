<?php
require_once(__DIR__ . '/../../models/EmpleadoModelo.php');
//session_start();

function mostrarEmpleados() {
    $hotel_id = $_SESSION['hotel_id'];
    $empleados = obtenerEmpleadosPorHotel($hotel_id);
    require(__DIR__ . '/../../views/Empleado/EmpleadoListadoVista.php');
}
function eliminarEmpleadoPopup($id){
    $empleados = obtenerEmpleadosPorHotel($_SESSION['hotel_id']);
    $empleado = obtenerEmpleadoPorId($id);
    $mostrarPopUpEliminar = true;
    $empleadoAEliminar = [
        'id' => $empleado['id'],
        'nombre' => $empleado['username'],
    ];
    require(__DIR__ . '/../../views/Empleado/EmpleadoListadoVista.php');
}   
?>
