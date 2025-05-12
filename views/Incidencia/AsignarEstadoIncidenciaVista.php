<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Estado a Incidencia</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/alerts.css">
</head>
<body>
<?php include(__DIR__ . '/../Layout/menuLateral.php'); ?>

    <div class="main-container with-sidebar">
        <h2>Asignar Estado a Incidencia</h2>
        <?php if (isset($error)){ echo "<div class='error'>$error</div>"; }?>
        <form action="/procesar_estado_incidencia" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($incidencia['id']) ?>">
            <label>Estado actual: <?= htmlspecialchars($incidencia['estado']) ?></label>
            <label>Nuevo estado:</label>
            <select name="estado" required>
                <option value="pendiente" <?= $incidencia['estado']=='pendiente'?'selected':''; ?>>Pendiente</option>
                <option value="en proceso" <?= $incidencia['estado']=='en proceso'?'selected':''; ?>>En Proceso</option>
                <option value="solucionada" <?= $incidencia['estado']=='solucionada'?'selected':''; ?>>Solucionada</option>
            </select>
            <input type="submit" value="Actualizar Estado">
        </form>
        <p><a href="/incidencias">Volver al listado</a></p>
    </div>
</body>
</html>
