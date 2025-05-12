<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/alerts.css">

</head>
<body>
<?php include(__DIR__ . '/../Layout/menuLateral.php'); echo htmlspecialchars($empleado['id']);?>
<div class="main-container with-sidebar">
    <h2>Editar Empleado</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="/actualizar_empleado" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($empleado['id']) ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre"  value="<?= htmlspecialchars($empleado['username']) ?>"><br>
        <label>Mail:</label>
        <input type="email" name="mail"  value="<?= htmlspecialchars($empleado['email']) ?>"><br>
        <label>Puesto:</label>
        <select name="puesto" >
            <option value="gerente" <?= $empleado['rol']=='gerente'?'selected':''; ?>>Gerente</option>
            <option value="recepcionista" <?= $empleado['rol']=='recepcionista'?'selected':''; ?>>Recepcionista</option>
            <option value="limpieza" <?= $empleado['rol']=='limpieza'?'selected':''; ?>>Limpieza</option>
            <option value="mantenimiento" <?= $empleado['rol']=='mantenimiento'?'selected':''; ?>>Mantenimiento</option>
        </select><br>
        <label>Salario:</label>
        <input type="text" name="salario" value="<?= htmlspecialchars($empleado['salario']) ?>"><br>
        <label>Nueva contraseña (dejar vacío para no cambiar):</label>
        <input type="password" name="contraseña"><br>
        <input type="submit" value="Actualizar">
    </form>
</div>
</body>
</html>
