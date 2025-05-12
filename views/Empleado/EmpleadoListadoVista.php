<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
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
    <h2>Listado de Empleados</h2>
    <a href="crear_empleado" class="btn">Crear nuevo empleado</a>


    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $emp): ?>
                <tr>
                    <td><?= htmlspecialchars($emp['username']) ?></td>
                    <td><?= htmlspecialchars(ucfirst($emp['rol'])) ?></td>
                    <td>
                        <a href="editar_empleado/<?=$emp['id']?>">Editar</a>
                        |
                        <a href="eliminar_empleado/<?=$emp['id']?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?php include(__DIR__ . '/EliminarEmpleadoVista.php'); ?>

</body>
</html>
