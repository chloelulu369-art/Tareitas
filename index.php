<?php 
include 'conexion.php';
$tareas_pendientes = "SELECT * FROM tareas WHERE estado=0";
$res_tareas = mysqli_query($conexion, $tareas_pendientes);
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
    <?php include 'header.php'; ?>
    <h1> Tareas pendientes</h1>
    <?php
        while($fila = mysqli_fetch_assoc($res_tareas)) { ?>
           <details>
                <summary>
                   <?php echo $fila['nombre']; ?> <br>
                   <?php echo $fila['prioridad']; ?>
                </summary>
                <p>Descripción: <?php echo $fila['descripcion']; ?></p><br>
                <p>asignado para: <?php echo $fila['asignado']; ?></p><br>
                <p> echo por: <?php echo $fila['made']; ?></p><br>
                <?php if (!empty($fila['imagen_url'])) { ?>
                    <img src="<?php echo $fila['imagen_url']; ?>"><br>
                <?php }
                $id_tareas = "SELECT * FROM pasos WHERE $res_tareas = '" . $fila['id'] . "' ORDER BY orden ASC";
                $id_tareas = "mysqli_query($conexion, $sqlpasos)";
                while(mysqli_fetch_assoc($sqlpasos)) { ?> 
                    <li <?php echo $fila['orden']; ?>></li>
                    <li <?php echo $fila['texto']; ?>></li><br>
                 <?php } ?>
           </details>
           <form>
           <button type="submit" name="tarea">Guardar</button><br>
           </form>
           <button type="" name="editar_tarea">Editar</button><br>
         <?php } ?>
</body>
</html>