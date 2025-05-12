<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Habitación</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/alerts.css">

</head>
<body>

<?php if (!empty($mostrarPopUpEliminar) && !empty($habitacionAEliminar)): ?>
        <div class="overlay"></div>
        <div class="popup">
            <div class="popup-content">
                <h3>Eliminar habitación</h3>
                <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                <p>¿Seguro que deseas eliminar la habitación <strong><?= htmlspecialchars($habitacion['room_name']) ?></strong>?</p>
                <form action="/borrar_habitacion" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($habitacion['id']) ?>">
                    <input type="submit" value="Sí, eliminar">
                    <a href="/habitaciones">Cancelar</a>
                </form>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
