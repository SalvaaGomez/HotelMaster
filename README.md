# HotelMaster
## Descripción
HotelMaster (https://hotelmaster.es)  es una aplicación web que aborda la necesidad de una plataforma que permita gestionar internamente un hotel desde distintas áreas (recepción, mantenimiento, limpieza y gerencia) de forma organizada. La mayoría de hoteles pequeños o medianos no cuentan con herramientas centralizadas que coordinen las tareas del personal o el estado de las habitaciones, lo que genera errores, falta de comunicación y pérdidas de tiempo.

La solución implementada es HotelMaster, una aplicación web basada en el patrón Modelo-Vista-Controlador (MVC) que permite gestionar habitaciones, empleados e incidencias según el rol del usuario. Esta permite gestionar las habitaciones, empleados e incidencias de un hotel, adaptando las funcionalidades a cada usuario. La aplicación facilita tareas como check-in, asignación de limpiezas, control de accesos y resolución de problemas internos.

Tecnologías utilizadas
Tecnología	Uso principal
PHP	Lógica del servidor (backend y controladores)
MySQL	Almacenamiento de datos persistente (base de datos)
HTML	Estructura del contenido web
CSS	Estilización de las vistas (estilo personalizado)
JavaScript	Comportamiento dinámico (pop-ups, interacciones)
Apache + .htaccess	Servidor web y rutas amigables (URLs bonitas)

## Tecnologías utilizadas

| Tecnología          | Uso principal                                                  |
|---------------------|----------------------------------------------------------------|
| **PHP**             | Lógica del servidor (backend y controladores)                 |
| **MySQL**           | Almacenamiento de datos persistente (base de datos)           |
| **HTML**            | Estructura del contenido web                                  |
| **CSS**             | Estilización de las vistas (estilo personalizado)             |
| **JavaScript**      | Comportamiento dinámico (pop-ups, interacciones)              |
| **Apache + .htaccess** | Servidor web y rutas amigables (URLs bonitas)              |

---
#  Instrucciones de uso
## 🗂️ Índice

- [1. Acceso y registro](#-1-acceso-y-registro)
  - [Iniciar sesión](#%EF%B8%8F-iniciar-sesión)
  - [Registrarse (uso exclusivo para gerentes)](#-registrarse-uso-exclusivo-para-gerentes)
- [2. Navegación y pantalla principal](#-2-navegación-y-pantalla-principal)
- [3. Funcionalidades por tipo de usuario](#-3-funcionalidades-por-tipo-de-usuario)
- [4. Incidencias](#-4-incidencias)
- [5. Historial](#-5-historial)
- [6. Cierre de sesión](#-6-cierre-de-sesión)
- [7. Seguridad](#%EF%B8%8F-7-seguridad)
- [8. Recomendaciones de uso](#-8-recomendaciones-de-uso)
- [¿Cómo ejecutar este proyecto?](#%EF%B8%8F-cómo-ejecutar-este-proyecto)
## 🔐 1. Acceso y registro

### ▶️ Iniciar sesión

Para acceder a la plataforma, dirígete a la URL de la aplicación (por ejemplo: `http://localhost/hotel/` si estás en entorno local).  
Se mostrará la **pantalla de login**, donde deberás introducir tus credenciales: correo electrónico y contraseña.

![image](https://github.com/user-attachments/assets/8cac96dc-77c5-4165-b02f-2ec762e180de)


Una vez iniciada la sesión correctamente, accederás al panel de usuario correspondiente a tu rol, desde donde podrás comenzar a trabajar.

---

### 🏁 Registrarse (uso exclusivo para gerentes)

Si es la **primera vez** que usas HotelMaster y aún no hay ningún hotel registrado, puedes crear uno usando el enlace “¿No tienes cuenta? Regístrate aquí”.

> ⚠️ **Solo el gerente puede registrar un hotel.**  
> Este formulario no está destinado a empleados, solo al usuario que será el gerente y administrador principal del hotel.

En el formulario de registro se solicitan:
- **Nombre del hotel**
- **Nombre de usuario**
- **Correo electrónico**
- **Contraseña**

Una vez enviado, se crea:
- Un nuevo **registro de hotel** en la base de datos
- Una cuenta de **gerente** asociada exclusivamente a ese hotel

![image](https://github.com/user-attachments/assets/0a1c7dab-e6cb-4778-b71f-0e032472b120)

---

## 🧭 2. Navegación y pantalla principal

Una vez dentro del sistema, se presenta la **pantalla principal**, compuesta por:

- Una barra lateral izquierda (el **menú principal**)
- El **contenido dinámico** según la sección activa

El menú lateral muestra opciones diferentes según el tipo de usuario.  
Por ejemplo:
- El **gerente** verá “Habitaciones”, “Empleados”, “Incidencias”, “Historial”, etc.
- Un usuario de **limpieza** o **recepción** verá solo sus funciones correspondientes.

![image](https://github.com/user-attachments/assets/3e993d58-4d7c-4f76-83ac-ddbb89eb58fb)

---

## 👥 3. Funcionalidades por tipo de usuario

### 👤 Gerente

- Crear, editar y eliminar habitaciones
- Gestionar empleados y sueldos
- Gestionar todas las incidencias
- Consultar históricos de habitaciones e incidencias

📸 *(Captura del CRUD de habitaciones y empleados)*

### 🛎 Recepcionista

- Ver habitaciones disponibles
- Hacer check-in/check-out
- Crear incidencias
- Ver historial de habitaciones

![image](https://github.com/user-attachments/assets/ef9b12f5-fa1b-4e2d-91a1-2eb17ca09eae)

### 🧹 Limpieza

- Marcar habitaciones como limpias
- Crear incidencias relacionadas
- Cambiar estado a libre, ocupada o limpieza

![image](https://github.com/user-attachments/assets/54ec4fde-738f-4b86-8e73-602336ad51e6)


### 🔧 Mantenimiento

- Bloquear habitaciones
- Crear y resolver incidencias técnicas
- Cambiar estado a mantenimiento o libre

![image](https://github.com/user-attachments/assets/35fcb569-d322-42d9-9cab-8f13d1efd4b4)

---

## 📌 4. Incidencias

### 🧾 Crear incidencia

Formulario con:
- Título
- Descripción (textarea)
- Departamento destino
- Lugar asociado

![image](https://github.com/user-attachments/assets/6c1efdf7-e928-4b4d-9f07-b44b04bdc45e)

### 📋 Panel de incidencias

- **Mis incidencias** (dirigidas a tu rol)
- **Otras incidencias** (solo consulta)
- Ver estado actual, asignar estado, solventar, ver más

![image](https://github.com/user-attachments/assets/c25fc628-c95f-4f5b-94cb-eee7398befc1)

---

## 📜 5. Historial

### 🏨 Habitaciones

- Historial de ocupaciones
- Cambios de estado
- Check-in y check-out

![image](https://github.com/user-attachments/assets/83879ec3-14a4-436b-b02c-01d19e832b80)

### 🛠️ Incidencias

- Solo visible para gerente
- Muestra estado final y fecha de resolución
- Botón “ver más” para detalles

![image](https://github.com/user-attachments/assets/58ba35ff-fa3c-41a3-b847-a8c1260728b8)

---

## 🚫 6. Cierre de sesión

Pulsa “Cerrar sesión” en el menú lateral para salir de forma segura.

---

## 🛡️ 7. Seguridad

- Control de roles por usuario
- Validaciones backend
- Contraseñas cifradas
- Protección contra SQL injection

---

## ✅ 8. Recomendaciones de uso

- Actualiza los estados en tiempo real
- Usa contraseñas seguras
- Gerentes: revisen el histórico con frecuencia
- Trabaja desde un navegador moderno

---

## ⚙️ ¿Cómo ejecutar este proyecto?

1. Clona este repositorio.
2. Copia la carpeta a tu servidor local (ej. `htdocs` en XAMPP).
3. Importa `hotelmaster.sql` a tu base de datos MySQL.
4. Configura conexión en `config.php`.
5. Abre `http://localhost/hotelmaster/` en tu navegador.

---
