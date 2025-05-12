<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/alerts.css">
</head>
<body>
<?php include(__DIR__ . '/Layout/menuLateral.php'); ?>
    <div class="main-container with-sidebar">
        <h2>Bienvenido/a, <?= htmlspecialchars($_SESSION['nombre']) ?></h2>
        <div style="display:flex; gap: 30px; flex-wrap:wrap;">
            <a style="flex:1; min-width:170px; background:#f7faff; border-radius:12px; box-shadow:0 1px 8px #e3e8f2; padding:22px; margin-bottom:18px; color: inherit; text-decoration: none;"
                href="/habitaciones">
                <h3>Habitaciones</h3>
                <div style="font-size:2.2rem; font-weight:700; color:#284983;"><?= $numHabitaciones ?></div>
                <div>Total habitaciones</div>
            </a>
            <a style="flex:1; min-width:170px; background:#f7faff; border-radius:12px; box-shadow:0 1px 8px #e3e8f2; padding:22px; margin-bottom:18px; color: inherit; text-decoration: none;"
                href="/empleados">
                <h3>Empleados</h3>
                <div style="font-size:2.2rem; font-weight:700; color:#284983;"><?= $numEmpleados ?></div>
                <div>Total empleados</div>
            </a>
            <a style="flex:1; min-width:170px; background:#f7faff; border-radius:12px; box-shadow:0 1px 8px #e3e8f2; padding:22px; margin-bottom:18px; color: inherit; text-decoration: none;"
                href="/incidencias">
                <h3>Mis Incidencias Pendientes</h3>
                <div style="font-size:2.2rem; font-weight:700; color:#e64a45;"><?= $numIncidenciasPendientes ?></div>
                <div>Pendientes</div>
            </a>
            <a style="flex:1; min-width:170px; background:#f7faff; border-radius:12px; box-shadow:0 1px 8px #e3e8f2; padding:22px; margin-bottom:18px; color: inherit; text-decoration: none;"
                href="/incidencias">
                <h3>Mis Incidencias Solucionadas</h3>
                <div style="font-size:2.2rem; font-weight:700; color:#32b08d;"><?= $numIncidenciasSolucionadas ?></div>
                <div>Solucionadas</div>
            </a>
        </div>
    </div>
</body>
</html>
