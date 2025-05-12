<?php
//session_start();
require_once(__DIR__ . '/../../models/IncidenciaModelo.php');

function mostrarListadoIncidencias() {
    $hotel_id = $_SESSION['hotel_id'];
    $rol = $_SESSION['rol'];
    if ($rol == 'gerente') {
        $rol = 'gerencia';
    }
    $mis_incidencias = obtenerIncidenciasDelRol($rol, $hotel_id);
    $otras_incidencias = obtenerIncidenciasDeOtrosRoles($rol, $hotel_id);

    require(__DIR__ . '/../../views/Incidencia/IncidenciaListadoVista.php');
}

function solventarIncidenciaPopup($id){
    $hotel_id = $_SESSION['hotel_id'];
    $rol = $_SESSION['rol'];
    if ($rol == 'gerente') {
        $rol = 'gerencia';
    }
    $mis_incidencias = obtenerIncidenciasDelRol($rol, $hotel_id);
    $otras_incidencias = obtenerIncidenciasDeOtrosRoles($rol, $hotel_id);
    $incidencia = obtenerIncidenciaPorIdYHotel($id, $hotel_id);


    $mostrarPopUpSolventar = true;
    $incidenciaASolventar = [
        'id' => $incidencia['id'],
        'nombre' => $incidencia['nombre'],
    ];
    require(__DIR__ . '/../../views/Incidencia/IncidenciaListadoVista.php');
}
?>
