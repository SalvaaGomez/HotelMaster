<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial global de incidencias</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/alerts.css">
</head>
<body>
<?php include(__DIR__ . '/../Layout/menuLateral.php'); ?>

    <div class="main-container with-sidebar">
    <h2>Historial de Incidencias Solventadas</h2>
        <?php if (empty($historial)): ?>
            <div class="alert">No hay incidencias solventadas.</div><br>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>Estado</th>
                        <th>Fecha de solucionado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historial as $inc): ?>
                        <tr>
                            <td><?= htmlspecialchars($inc['nombre']) ?></td>
                            <td><?= htmlspecialchars(ucfirst($inc['departamento'])) ?></td>
                            <td><span class="mensaje-exito" style="background:#cfffc0;color:#284983;padding:5px 10px;border-radius:8px;">
                            <?= htmlspecialchars(ucfirst($inc['estado'])) ?>
                            </span></td>
                            <td><?= htmlspecialchars($inc['fecha_cambio']) ?></td>
                            <td>
                                <a href="incidencia/<?= $inc['id'] ?>" class="btn">Ver más</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="/incidencias" class="btn">Volver a incidencias</a>
    </div>
</body>
</html>