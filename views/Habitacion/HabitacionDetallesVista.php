<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de habitación</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/alerts.css">
</head>
<body>
<?php include(__DIR__ . '/../Layout/menuLateral.php'); ?>

    <div class="main-container with-sidebar">
        <h2>Detalles de la habitación <span><?= htmlspecialchars($habitacion['room_name']) ?></span></h2>
        <p><strong>Nombre: </strong>Habitación <span class="badge"><?= htmlspecialchars($habitacion['room_name']) ?></span></p>
        <p><strong>Tipo de habitación:</strong> <span class="badge"><?= htmlspecialchars($habitacion['room_type']) ?></span></p>
        <p><strong>Precio: </strong> <span class="badge"><?= htmlspecialchars($habitacion['price']) ?></span>€/noche</p>
        <p><strong>Estado actual:</strong> <span class="badge"><?= htmlspecialchars($habitacion['status']) ?></span></p>
        <br>
        <h3>Historial de cambios de estado</h3>
        <?php if (empty($historial)): ?>
            <div class="alert">No hay cambios registrados.</div><br>

        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>De</th>
                        <th>A</th>
                        <th>Realizado por</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historial as $cambio): ?>
                        <tr>
                            <td><?= htmlspecialchars($cambio['fecha_cambio']) ?></td>
                            <td><?= htmlspecialchars(ucfirst($cambio['estado_viejo'])) ?></td>
                            <td><?= htmlspecialchars(ucfirst($cambio['estado_nuevo'])) ?></td>
                            <td><?= htmlspecialchars($cambio['username'])?> (<?= $cambio['username']==null?"Empleado Eliminado":htmlspecialchars($cambio['rol']) ?>)</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="/habitaciones" class="btn">Volver al listado</a>
    </div>
</body>
</html>
