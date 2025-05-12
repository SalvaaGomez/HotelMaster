<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/public/css/base.css">
    <link rel="stylesheet" href="/public/css/layout.css">
    <link rel="stylesheet" href="/public/css/forms.css">
    <link rel="stylesheet" href="/public/css/table.css">
    <link rel="stylesheet" href="/public/css/sidebar.css">
    <link rel="stylesheet" href="/public/css/popup.css">
    <link rel="stylesheet" href="/public/css/alerts.css">

</head>
<body class ="auth">
    <div class="main-container form-auth">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form action="procesar_login" method="post">
            <label>Email:</label>
            <input type="email" name="mail" required><br>
            <label>Contraseña:</label>
            <input type="password" name="contraseña" required><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <p><a href="registro">¿No tienes cuenta? Regístrate aquí</a></p>
    </div>
</body>
</html>
