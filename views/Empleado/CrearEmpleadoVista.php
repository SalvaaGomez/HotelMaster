<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Empleado</title>
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
    <h2>Crear Nuevo Empleado</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="guardar_empleado" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" ><br>
        <label>Mail:</label>
        <input type="email" name="mail" ><br>
        <label>Contraseña:</label>
        <input type="password" name="contraseña" ><br>
        <label>Salario:</label>
        <input type="text" name="salario" ><br>
        <label>Puesto:</label>
        <select name="puesto" >
            <option value="gerente">Gerente</option>
            <option value="recepcionista">Recepcionista</option>
            <option value="limpieza">Limpieza</option>
            <option value="mantenimiento">Mantenimiento</option>
        </select><br>
        <input type="submit" value="Crear">
    </form>
</div>
</body>
</html>
