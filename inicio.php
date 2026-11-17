
<?php 
include 'conexion.php';
$tareas_pendientes = "SELECT * FROM tareas WHERE estado=0";
mysqli_query($conexion, $tareas_pendientes);
$sqlpasos = "SELECT * FROM pasos WHERE id_tareas=id(tareas)  ORDER BY orden ASC";
mysqli_query($conexion, $sqlpasos);
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
        while($fila = mysqli_fetch_assoc($tareas_pendientes)) { ?>
           <details>
                <summary>
                    echo $id_tareas;
                    echo $prioridad;
                </summary>
                <p>Descripción: <?php echo $fila['descripcion']; ?></p><br>
                <p>asignado para: <?php echo $fila['asignado']; ?></p><br>
                <p> echo por: <?php echo $fila['made']; ?></p><br>
                <?php if (!empty('imagen_url')) { ?>
                    <img <?php echo $fila['imagen_url']; ?>><br>
                <?php }
                $sqlpasos = "SELECT * FROM pasos WHERE id_tareas=id(tareas)  ORDER BY orden ASC";
                $sqlpasos = mysqli_query($conexion, $tareitas);
                while(mysqli_fetch_assoc($sqlpasos)) { ?> 
                    <li <?php echo $fila['orden']; ?>></li>
                    <li <?php echo $fila['texto']; ?>></li><br>
                 <?php } ?>
           </details>
           <form>
           <button type="submit" name="tarea">Guardar</button><br>
           </form>
         <?php } ?>
</body>
</html>