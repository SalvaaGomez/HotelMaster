<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Incidencia</title>
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
        <h2>Detalles de la Incidencia</h2>
        <div>
            <p><strong><?= htmlspecialchars($incidencia['nombre']) ?></strong></p>
            <br>
            <p><?= nl2br(htmlspecialchars($incidencia['descripcion'])) ?></p>
            <br>
            <p><strong>Departamento al que va dirigido:</strong> <?= htmlspecialchars(ucfirst($incidencia['departamento']))?></p>
            <p><strong>Lugar:</strong> <?= htmlspecialchars($incidencia['lugar']) ?></p>
            <p><strong>Estado:</strong> <?= htmlspecialchars(ucfirst($incidencia['estado']))?></p>
            <p><strong>Fecha de creación:</strong> <?= htmlspecialchars($incidencia['fecha_creacion'] ?? '-') ?></p>
            <br>
        </div>
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
        <p><a href="/incidencias" class = "btn">Atrás</a></p>
    </div>
</body>
</html>
