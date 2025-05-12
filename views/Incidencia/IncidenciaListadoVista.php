<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Incidencias</title>
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
        <h2>Listado de Incidencias</h2>

        <div class="btn-group" style="margin-bottom: 20px;">
            <a href="crear_incidencia" class="btn btn-primary">Crear nueva incidencia</a>
            <?php if ($_SESSION['rol'] === 'gerente'): ?>
                <a href="historial_incidencias" class="btn">Histórico Incidencias</a>
            <?php endif; ?>
        </div>

        <!-- MIS INCIDENCIAS -->
        <h3>Mis Incidencias</h3>
        <?php if (empty($mis_incidencias)): ?>
            <div class="alert alert-warning">

            No hay incidencias dirigidas a tu departamento.
        </div>
        <?php else: ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>Lugar</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mis_incidencias as $inc): ?>
                        <tr>
                            <td><?= htmlspecialchars($inc['nombre']) ?></td>
                            <td><?= htmlspecialchars(ucfirst($inc['departamento'])) ?></td>
                            <td><?= htmlspecialchars($inc['lugar']) ?></td>
                            
                            <td><span class="mensaje-exito" style="background:#dedede;color:#284983;padding:5px 10px;border-radius:8px;">
                            <?= htmlspecialchars(ucfirst($inc['estado'])) ?>
                            </span></td>
                            <td>
                                <a href="estado_incidencia/<?= $inc['id'] ?>" class="btn">Asignar Estado</a>
                                <a href="solventar_incidencia/<?= $inc['id'] ?>" class="btn">Solventar</a>
                                <a href="incidencia/<?= $inc['id'] ?>" class="btn">Ver más</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <!-- OTRAS INCIDENCIAS -->
        <h3>Otras Incidencias</h3>
        <?php if (empty($otras_incidencias)): ?>
            <div class="alert">No hay otras incidencias registradas.</div>
        <?php else: ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>Lugar</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($otras_incidencias as $inc): ?>
                        <tr>
                            <td><?= htmlspecialchars($inc['nombre']) ?></td>
                            <td><?= htmlspecialchars(ucfirst($inc['departamento'])) ?></td>
                            <td><?= htmlspecialchars($inc['lugar']) ?></td>
                            <td><span class="mensaje-exito" style="background:#dedede;color:#284983;padding:5px 10px;border-radius:8px;">
                            <?= htmlspecialchars(ucfirst($inc['estado'])) ?>
                            </span></td>
                            <td>
                                <a href="incidencia/<?= $inc['id'] ?>" class="btn">Ver más</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <?php include(__DIR__ . '/SolventarIncidenciaVista.php'); ?>

    </div>
</body>
</html>
