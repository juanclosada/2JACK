<?php
include('conexion.php');

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$id_rol = 1;

// Insertar en la base de datos
$sql = "INSERT INTO usuarios (nombre, correo, contrasena, id_rol) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nombre, $correo, $contrasena, $id_rol);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente. <a href='login.php'>Iniciar sesión</a>";
} else {
    echo "Error al registrar usuario: " . $conn->error;
}

$conn->close();
?>