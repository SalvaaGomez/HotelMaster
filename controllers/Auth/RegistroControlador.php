<?php
require_once(__DIR__ . '/../../models/AuthModelo.php');

function mostrarFormularioRegistro() {
    require(__DIR__ . '/../../views/Auth/RegistroVista.php');
}

function procesarFormularioRegistro() {
    $nombreHotel = $_POST['nombre_hotel'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $mail = $_POST['mail'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    if ($nombreHotel && $nombre && $mail && $contraseña) {
        $exito = crearHotelYGerente($nombreHotel, $nombre, $mail, $contraseña);
        if ($exito) {
            header('Location: login');
            exit;
        } else {
            $error = "No se pudo registrar el gerente o el email ya existe.";

        }
    } else {
        $error = "Todos los campos son obligatorios.";
        
    }
    require(__DIR__ . '/../../views/Auth/RegistroVista.php');

}
?>
