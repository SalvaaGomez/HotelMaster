<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Estado Habitación</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/alerts.css">

</head>
<body>
<?php if (!empty($mostrarPopUpAsignarEstado) && !empty($habitacionEstado)): ?>
    <div class="overlay"></div>
    <div class="popup">
        <div class="popup-content">
            <h3>Asignar estado a la habitación</h3>
            <?php if (isset($error)){ echo "<div class='error'>$error</div>"; }?>

            <p>Habitación: <b><?= htmlspecialchars($habitacionEstado['nombre']) ?></b></p>
            <?php
            $rol = $_SESSION['rol'];
            $estado_actual = $habitacionEstado['estado'];
            $puede_cambiar = false;
            $opciones = [];

            if ($rol === 'gerente') {
                $puede_cambiar = true;
                $opciones = ['Libre', 'Ocupada', 'Mantenimiento', 'Limpieza'];
            } elseif ($rol === 'recepcionista') {
                // Sólo si el estado actual es libre u ocupada
                if ($estado_actual === 'Libre' || $estado_actual === 'Ocupada') {
                    $puede_cambiar = true;
                    $opciones = ['Libre', 'Ocupada'];
                }
            } elseif ($rol === 'mantenimiento') {
                // Solo si estado actual es libre o mantenimiento
                if ($estado_actual === 'Libre' || $estado_actual === 'Mantenimiento') {
                    $puede_cambiar = true;
                    $opciones = ['Libre', 'Mantenimiento'];
                }
            } elseif ($rol === 'limpieza') {
                // Solo si estado actual es ocupada o limpieza
                if ($estado_actual === 'Limpieza' || $estado_actual === 'Ocupada') {
                    $puede_cambiar = true;
                    $opciones = ['Ocupada', 'Limpieza', 'Libre'];
                }
            }
            ?>

            <?php if ($puede_cambiar): ?>
                <form action="/confirmar_estado_habitacion" method="post">
                    <input type="hidden" name="id" value="<?= intval($habitacionEstado['id']) ?>">
                    <select name="nuevo_estado" required>
                        <?php
                        foreach ($opciones as $opcion) {
                            $selected = ($estado_actual == $opcion) ? 'selected' : '';
                            echo "<option value=\"$opcion\" $selected>" . ucfirst($opcion) . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Guardar" class="btn btn-primary">
                    <a href="/habitaciones" class="btn">Cancelar</a>
                </form>
            <?php else: ?>
                <div class="alert alert-warning">
                    No tienes permiso para cambiar el estado de esta habitación en este momento.
                </div>
                <a href="/habitaciones" class="btn">Volver</a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
</body>
</html>
