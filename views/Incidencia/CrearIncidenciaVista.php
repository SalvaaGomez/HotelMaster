<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Incidencia</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/alerts.css">
</head>
<body>
<?php include(__DIR__ . '/../Layout/menuLateral.php'); ?>

    <div class="main-container with-sidebar">
        <h2>Crear Incidencia</h2>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form action="procesar_crear_incidencia" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre">
            <label>Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="10"></textarea>
            <label>Departamento:</label>
            <select name="departamento">
                <option value="">Selecciona...</option>
                <option value="mantenimiento">Mantenimiento</option>
                <option value="limpieza">Limpieza</option>
                <option value="gerencia">Gerencia</option>
            </select>
            <label>Lugar (habitacion/sala):</label>
            <input type="text" name="lugar">
            <input type="submit" value="Crear">
        </form>
    </div>
</body>
</html>
