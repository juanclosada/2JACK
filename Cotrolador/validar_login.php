<?php
session_start();
include('conexion.php');

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $correo, $contrasena);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();
    $_SESSION['usuario'] = $usuario['nombre'];
    header("Location: dashboard.php");
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>
