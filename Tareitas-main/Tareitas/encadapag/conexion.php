<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "tareitas";

$conexion = mysqli_connect($server, $user, $password, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}