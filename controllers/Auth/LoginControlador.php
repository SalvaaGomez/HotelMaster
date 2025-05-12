<?php
require_once(__DIR__ . '/../../models/AuthModelo.php');
//session_start();

function mostrarFormularioLogin() {
    require(__DIR__ . '/../../views/Auth/LoginVista.php');
}

function procesarFormularioLogin() {
    $mail = $_POST['mail'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';
    $usuario = autenticarUsuario($mail, $contraseña);
    if ($usuario) {
        // Guardar datos relevantes en la sesión
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['username'];
        $_SESSION['rol'] = $usuario['rol'];
        $_SESSION['hotel_id'] = $usuario['hotel_id'];
        header('Location: inicio');
        exit;
    } else {
        $error = "Email o contraseña incorrectos.";
        require(__DIR__ . '/../../views/Auth/LoginVista.php');
    }
}
?>
