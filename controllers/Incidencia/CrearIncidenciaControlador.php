<?php
//session_start();
require_once(__DIR__ . '/../../models/IncidenciaModelo.php');

function mostrarFormularioCrearIncidencia() {
    require(__DIR__ . '/../../views/Incidencia/CrearIncidenciaVista.php');
}

function procesarFormularioCrearIncidencia() {
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $departamento = $_POST['departamento'] ?? '';
    $lugar = $_POST['lugar'] ?? '';
    $hotel_id = $_SESSION['hotel_id'];

    if ($nombre && $descripcion && $departamento && $lugar) {
        $exito = crearIncidencia($nombre, $descripcion, $departamento, $lugar, $hotel_id);
        if ($exito) {
            header('Location: /incidencias');
            exit;
        } else {
            $error = "No se pudo crear la incidencia.";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
    require(__DIR__ . '/../../views/Incidencia/CrearIncidenciaVista.php');
}
