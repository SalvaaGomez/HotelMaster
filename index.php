<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Obtener la url bonita, si existe
$url = $_GET['url'] ?? '';
$partes = explode('/', trim($url, '/'));

$accion = $partes[0] ?? 'dashboard';
$id = $partes[1] ?? null; // Para rutas tipo /editar_habitacion/3


$acciones_publicas = ['login', 'registro', 'procesar_login', 'procesar_registro'];


if (!isset($accion)) {
    $accion = 'inicio';
}

if (!in_array($accion, $acciones_publicas)) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login");
        exit;
    }
}

switch ($accion) {
    // ... otras rutas ...
    case 'crear_habitacion':
        require_once('controllers/Habitacion/CrearHabitacionControlador.php');
        mostrarFormularioCrear();
        break;
    case 'guardar_habitacion':
        require_once('controllers/Habitacion/CrearHabitacionControlador.php');
        procesarFormularioCrear();
        break;
    case 'editar_habitacion':
        require_once('controllers/Habitacion/EditarHabitacionControlador.php');
        mostrarFormularioEditar($id);
        break;
    case 'actualizar_habitacion':
        require_once('controllers/Habitacion/EditarHabitacionControlador.php');
        procesarFormularioEditar();
        break;
    case 'estado_habitacion':
        require_once('controllers/Habitacion/HabitacionListadoControlador.php');
        asignarEstadoHabitacionPopup($id);
        break;
    case 'confirmar_estado_habitacion':
        require_once('controllers/Habitacion/AsignarEstadoHabitacionControlador.php');
        confirmarAsignarEstadoHabitacion();
        break;
    case 'eliminar_habitacion':
        require_once('controllers/Habitacion/HabitacionListadoControlador.php');
        eliminarHabitacionPopup($id);
        break;
    case 'borrar_habitacion':
        require_once('controllers/Habitacion/EliminarHabitacionControlador.php');
        procesarEliminar();
        break;
    case 'habitacion':
        require_once('controllers/Habitacion/HabitacionDetallesControlador.php');
        mostrarDetallesHabitacion($id);
        break;
    case 'historial_incidencias':
        require_once('controllers/Incidencia/IncidenciaHistorialControlador.php');
        mostrarHistorialGlobalIncidencias();
        break;
    
    case 'crear_empleado':
        require_once('controllers/Empleado/CrearEmpleadoControlador.php');
        mostrarFormularioCrearEmpleado();
        break;
    case 'guardar_empleado':
        require_once('controllers/Empleado/CrearEmpleadoControlador.php');
        procesarFormularioCrearEmpleado();
        break;
    case 'editar_empleado':
        require_once('controllers/Empleado/EditarEmpleadoControlador.php');
        mostrarFormularioEditarEmpleado($id);
        break;
    case 'actualizar_empleado':
        require_once('controllers/Empleado/EditarEmpleadoControlador.php');
        procesarFormularioEditarEmpleado();
        break;
    case 'eliminar_empleado':
        require_once('controllers/Empleado/EmpleadoListadoControlador.php');
        eliminarEmpleadoPopup($id);
        break;
    case 'borrar_empleado':
        require_once('controllers/Empleado/EliminarEmpleadoControlador.php');
        procesarEliminarEmpleado();
        break;
    
    case 'incidencias':
        require_once('controllers/Incidencia/IncidenciaListadoControlador.php');
        mostrarListadoIncidencias();
        break;
    
    case 'crear_incidencia':
        require_once('controllers/Incidencia/CrearIncidenciaControlador.php');
        mostrarFormularioCrearIncidencia();
        break;
    case 'procesar_crear_incidencia':
        require_once('controllers/Incidencia/CrearIncidenciaControlador.php');
        procesarFormularioCrearIncidencia();
        break;
    
    case 'estado_incidencia':
        require_once('controllers/Incidencia/AsignarEstadoIncidenciaControlador.php');
        mostrarFormularioAsignarEstadoIncidencia($id);
        break;
    case 'procesar_estado_incidencia':
        require_once('controllers/Incidencia/AsignarEstadoIncidenciaControlador.php');
        procesarFormularioAsignarEstadoIncidencia();
        break;
    
    case 'solventar_incidencia':
        require_once('controllers/Incidencia/IncidenciaListadoControlador.php');
        solventarIncidenciaPopup($id);
        break;
    case 'procesar_solventar_incidencia':
        require_once('controllers/Incidencia/SolventarIncidenciaControlador.php');
        procesarSolventarIncidencia();
        break;
    
    case 'incidencia':
        require_once('controllers/Incidencia/VerIncidenciaControlador.php');
        mostrarDetallesIncidencia($id);
        break;
    
                
    case 'registro':
        require_once('controllers/Auth/RegistroControlador.php');
        mostrarFormularioRegistro();
        break;
    case 'procesar_registro':
        require_once('controllers/Auth/RegistroControlador.php');
        procesarFormularioRegistro();
        break;
    case 'login':
        require_once('controllers/Auth/LoginControlador.php');
        mostrarFormularioLogin();
        break;
    case 'procesar_login':
        require_once('controllers/Auth/LoginControlador.php');
        procesarFormularioLogin();
        break;
    case 'logout':
        require_once('controllers/Auth/LogoutControlador.php');
        break;
                    
    
    case 'empleados':
        require_once('controllers/Empleado/EmpleadoListadoControlador.php');
        mostrarEmpleados();
        break;
            
    // ... otras rutas ...
    case 'habitaciones':
        require_once('controllers/Habitacion/HabitacionListadoControlador.php');
        mostrarHabitaciones();
        break;

    case 'inicio':
        default:
            require_once('controllers/PanelPrincipalControlador.php');
            mostrarDashboard();
            break;
            
}

?>
