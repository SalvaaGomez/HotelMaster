<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Gerente</title>

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

    <h2>Registro</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="procesar_registro" method="post">
        <label>Nombre del Hotel:</label>
        <input type="text" name="nombre_hotel" ><br>
        <label>Nombre (Gerente):</label>
        <input type="text" name="nombre" ><br>
        <label>Email:</label>
        <input type="email" name="mail" ><br>
        <label>Contraseña:</label>
        <input type="password" name="contraseña" ><br>
        <input type="submit" value="Registrarse">
    </form>
    <p><a href="login">Ya tienes cuenta? Inicia sesión aquí</a></p>
    </div>
</body>
</html>
