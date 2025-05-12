<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Empleado</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/alerts.css">

</head>
<body>
<?php if (!empty($mostrarPopUpEliminar) && !empty($empleadoAEliminar)): ?>
    <div class="overlay"></div>
        <div class="popup">
            <div class="popup-content">
            <h2>Eliminar Empleado</h2>
            <?php if (isset($error))
                echo "<p style='color:red;'>$error</p>"; ?>
            <p>¿Estás seguro de que quieres eliminar a <strong><?= htmlspecialchars($empleado['username']) ?></strong>?</p>
            <form action="/borrar_empleado" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($empleado['id']) ?>">
                <input type="submit" value="Sí, eliminar">
                <a href="/empleados">Cancelar</a>
            </form>
        </div>
    </div>
<?php endif;?>
</body>
</html>
