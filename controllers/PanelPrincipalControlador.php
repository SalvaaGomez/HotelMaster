<?php
//session_start();
require_once(__DIR__ . '/../models/HabitacionModelo.php');
require_once(__DIR__ . '/../models/EmpleadoModelo.php');
require_once(__DIR__ . '/../models/IncidenciaModelo.php');

function mostrarDashboard() {
    $hotel_id = $_SESSION['hotel_id'];
    $rol = $_SESSION['rol'];
    if ($rol == 'gerente') {
        $rol = 'gerencia';
    }
    // Datos para dashboard
    $numHabitaciones = obtenerNumeroHabitacionesPorHotel($hotel_id);
    $numEmpleados = obtenerNumeroEmpleadosPorHotel($hotel_id);
    $numIncidenciasPendientes = obtenerNumeroIncidenciasPorHotelEstadoYRol($hotel_id, 'pendiente',$rol);
    $numIncidenciasSolucionadas = obtenerNumeroIncidenciasPorHotelEstadoYRol($hotel_id, 'solucionada', $rol);
    $rol = $_SESSION['rol'];

    require(__DIR__ . '/../views/DashboardVista.php');
}
