<!-- views/Layout/menuLateral.php -->
<nav class ="sidebar">
    <ul>
        <li><a href="inicio">Inicio</a></li>
        <li><a href="/habitaciones">Habitaciones</a></li>
        <?php
        if ($_SESSION['rol'] == 'gerente') { ?>
                <li><a href="/empleados">Empleados</a></li>

        <?php
        }
        ?>
        <li><a href="/incidencias">Incidencias</a></li>
        <li><a href="/logout">Cerrar Sesión</a></li>
    </ul>
</nav>
