

<!DOCTYPE html>
<html lang="en">

<head>
    <header>
    <?php
   
   require_once '../header.php'; // contiene el navbar
    ?>
    </header>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jefe de Bodega</title>
</head>

<body>
    <h1>Bienvenido al panel de administración del jefe de bodega</h1>
    <p>Hola, <?php session_start(); echo $_SESSION['usuario']; ?>. Eres un jefe de bodega.</p>
    <a href="/2JACK/logout.php">Cerrar sesión</a>

    <h2>Menu Jefe de Bodega</h2>
    <ul>
        <li><a href="/2JACK/roles/administracionRoles/GestionarProductos.php">Gestionar productos</a></li>
        <li><a href="/2JACK/roles/administracionRoles/VerReportes.php">Ver reportes</a></li>
    </ul>
</body>

</html>
<?php
   // include 'conexion.php';
   include '../Footer.php'; // contiene el navbar
?>