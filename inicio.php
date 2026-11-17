
<?php 
include 'conexion.php';
$tareas_pendientes = "SELECT * FROM tareas WHERE estado=0";
$sql_pasos = "SELECT * FROM pasos WHERE id_tareas=id(tareas)";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1> Tareas pendientes</h1>
    <?php include 'header.php'; ?>
    <?php
        while(mysqli_fetch_assoc($tareas_pendientes)){
           <details>
                <summary>
                    echo $id_tareas;
                    echo $prioridad;
                </summary>
                <p></p><br>
                <p></p><br>
                <p></p><br>
                !empty(imagen_url= NULL){
                    <img src="$imagen_url"><br>
                }
                //ordenar sql pasos por pendientes+paso en orden asendente
                while(mysqli_fetch_assoc($tareas_pendientes)){
                    <li $sql_pasos></li><br>
                }
           </details>
        }
    ?>
</body>
</html>