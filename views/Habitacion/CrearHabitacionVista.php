<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Habitación</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/alerts.css">

</head>
<body>
<?php include(__DIR__ . '/../Layout/menuLateral.php'); ?>
<div class="main-container with-sidebar">
    <h2>Crear Nueva Habitación</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="guardar_habitacion" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" ><br>
        <label>Tipo:</label>
        <input type="text" name="tipo" ><br>
        <label>Precio:</label>
        <input type="text" name="precio" ><br>
        <br>
        <input type="submit" value="Crear">
    </form>
</div>
</body>
</html>
