<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solventar Incidencia</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/alerts.css">
</head>
<body>

    <?php if (!empty($mostrarPopUpSolventar) && !empty($incidenciaASolventar)): ?>
        <div class="overlay"></div>
        <div class="popup">
            <div class="popup-content">
                <h3>Solventar Incidencia</h3>
                <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                <p>¿Estás seguro de que quieres marcar la incidencia <strong><?= htmlspecialchars($incidencia['nombre']) ?></strong> como solucionada?</p>
                <form action="/procesar_solventar_incidencia" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($incidencia['id']) ?>">
                    <input type="submit" value="Sí, solventar">
                    <a href="/incidencias" class="btn">Cancelar</a>
                </form>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
