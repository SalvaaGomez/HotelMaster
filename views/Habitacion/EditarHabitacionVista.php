<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Habitación</title>
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
    <h2>Editar Habitación</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="/actualizar_habitacion" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($habitacion['id']) ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre"  value="<?= htmlspecialchars($habitacion['room_name']) ?>"><br>
        <label>Tipo:</label>
        <input type="text" name="tipo"  value="<?= htmlspecialchars($habitacion['room_type']) ?>"><br>
        <label>Precio:</label>
        <input type="text" name="precio"  value="<?= htmlspecialchars($habitacion['price']) ?>"><br>
        <br>
        <input type="submit" value="Editar">
    </form>
</div>
</body>
</html>
