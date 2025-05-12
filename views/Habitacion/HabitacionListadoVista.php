<!-- views/Habitacion/HabitacionListadoVista.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Habitaciones</title>
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
    <h2>Listado de Habitaciones</h2>
    <?php
    if ($_SESSION['rol'] == 'gerente') {?>
        <p><a href="crear_habitacion" class="btn">Crear nueva habitación</a></p>
    <?php
    }
    ?>
    <table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio ($)</th>
            <th>Estado</th>
            <?php
            if ($_SESSION['rol'] == 'gerente' || $_SESSION['rol'] == 'recepcionista') {?>
                <th>Acciones</th>
            <?php
            }
            ?>
            

        </tr>
    </thead>
    <tbody>
        <?php foreach ($habitaciones as $hab): ?>
            <tr>
                <td>Habitación <?= htmlspecialchars($hab['room_name']) ?></td>
                <td><?= htmlspecialchars($hab['price']) ?></td>
                <td><a href="estado_habitacion/<?= $hab['id'] ?>"><?= htmlspecialchars($hab['status']) ?></a></td>
                <?php
                    if ($_SESSION['rol'] == 'gerente' || $_SESSION['rol'] == 'recepcionista') {?>                
                    <td>
                    <?php
                        if ($_SESSION['rol'] == 'gerente') {?>
                        <a href="/editar_habitacion/<?= $hab['id'] ?>">Editar</a>
                        |
                        <a href="/eliminar_habitacion/<?= $hab['id'] ?>">Eliminar</a>
                        |
                    <?php } ?>
                        <a href="/habitacion/<?= $hab['id'] ?>">Ver más</a>
                    </td>
                    <?php
                    }
                    ?>

            </tr>

        <?php endforeach; ?>


        </tbody>
    </table>
        </div>
        <?php include(__DIR__ . '/EliminarHabitacionVista.php'); ?>
        <?php include(__DIR__ . '/AsignarEstadoHabitacionVista.php'); ?>


</body>
</html>
