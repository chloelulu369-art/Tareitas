<?php
$server = "localhost";
$user = "root";
$password = "";
$conexion = mysqli_connect($server, $user, $password);
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
$script_sql = file_get_contents("base.sql");
$db = "tareitas";
mysqli_multi_query($conexion, $script_sql);
while (mysqli_more_results($conexion) && mysqli_next_result($conexion)) {;}
mysqli_select_db($conexion, $db);
?>