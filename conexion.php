<?php 

$server = "localhost";
$user = "root";
$pass = "";
$db = "industria_2jack";

$conexion = new mysqli($server, $user, $pass, $db);
$conexion->set_charset("utf8");

if($conexion->connect_errno) {
    die("conexion fallida" . $conexion->connect_errno);
} else{
echo "conectado";
}

?>