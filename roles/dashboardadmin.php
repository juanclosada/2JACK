<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>
    <h1>Bienvenido al panel de administración</h1>
    <p>Hola, <?php session_start(); echo $_SESSION['usuario']; ?>. Eres un Administrador.</p>
    <a href="logout.php">Cerrar sesión</a>

    <h2>Opciones de administración</h2>
    <ul>
        <li><a href="/2JACK/roles/AdministracionRoles/GestionarUsuarios.php">Gestionar usuarios</a></li>
        <li><a href="/2JACK/roles/AdministracionRoles/VerReportes.php">Ver reportes</a></li>
        <li><a href="/2JACK/roles/AdministracionRoles/ConfiguracionSistema.php">Configuración del sistema</a></li>
    </ul>
</body>

</html>
<?php
   // include 'conexion.php';
    include '../Footer.php'; // contiene el navbar
?>