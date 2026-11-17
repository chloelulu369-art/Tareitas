<?php 
include 'conexion.php';

$id_tareas = isset($_GET['id']) ? $_GET['id'] : "";
           
    if (isset($_POST['paso_a_paso'])) {

        $id_tareas = $_POST['id_tareas'];
        $orden = $_POST['orden'];
        $texto = $_POST['texto'];

        if (!empty($id_tareas)){
           $sql = "INSERT INTO pasos (id_tareas, orden, texto) VALUES ('$id_tareas', '$orden', '$texto')";
           mysqli_query($conexion, $sql);
           $id = mysqli_insert_id($conexion);
           header("Location: tareas.php?id=" . $id_tareas); 
           exit();
        }
        else{
            print"error id tareas. primero gurdar form1, despues paso a paso";
        }
        exit();
    }
    
    if (isset($_POST['tarea'])) {

        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $prioridad = $_POST['prioridad'];
        $descripcion = $_POST['descripcion'];
        $imagen_url = $_POST['imagen_url'];
        $made = $_POST['made'];
        $asignado = $_POST['asignado'];

        if (empty($id)){
        $sql = "INSERT INTO tareas (nombre, prioridad, descripcion, imagen_url, made, asignado, completado) VALUES ('$nombre', '$prioridad', '$descripcion', '$imagen_url', '$made', '$asignado', 0)";
        mysqli_query($conexion, $sql) or die("Error MySQL: " . mysqli_error($conexion));
        $id = mysqli_insert_id($conexion);
        }
        else{
        $sql = "UPDATE tareas SET nombre = '$nombre', prioridad = '$prioridad', descripcion = '$descripcion', imagen_url = '$imagen_url', made = '$made', asignado = '$asignado' WHERE id = '$id'";
        mysqli_query($conexion, $sql);
        }
        mysqli_query($conexion, $sql) or die("Error MySQL: " . mysqli_error($conexion));

        header("Location: tareas.php?id=" . $id);
        exit();
    }
    
        $datos_tarea = [];
        $res_pasos = null;

        if (!empty($id_tareas)) {
            // 1. Traemos los datos de la tarea para rellenar el Form 1
            $sql_tarea = "SELECT * FROM tareas WHERE id = '$id_tareas'";
            $res_tarea = mysqli_query($conexion, $sql_tarea);
            $datos_tarea = mysqli_fetch_assoc($res_tarea);

            // 2. Traemos los pasos cargados para mostrar la listita
            $sql_pasos = "SELECT * FROM pasos WHERE id_tareas = '$id_tareas' ORDER BY orden ASC";
            $res_pasos = mysqli_query($conexion, $sql_pasos);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div>
    <?php include 'header.php'; ?>
    <form action="tareas.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id_tareas; ?>">               
        <label>Nombre de la tarea:</label><input type="text" name="nombre" value="<?php echo $datos_tarea['nombre'] ?? ''; ?>" required>  <br>                    
        <label>prioridad:</label><select name="prioridad">
            <option value="urgente" <?php if (($datos_tarea['prioridad'] ?? '') == 'urgente') echo 'selected'; ?>>Urgente</option>
            <option value="solucionar rapido" <?php if (($datos_tarea['prioridad'] ?? '') == 'solucionar rapido') echo 'selected'; ?>>Solucionar rapido</option>
            <option value="tranqui" <?php if (($datos_tarea['prioridad'] ?? '') == 'tranqui') echo 'selected'; ?>>tranqui</option>
            <option value="plata" <?php if (($datos_tarea['prioridad'] ?? '') == 'plata') echo 'selected'; ?>>plata</option>
        </select><br> 
        <label>descripcion:</label><textarea name="descripcion"><?php echo $datos_tarea['descripcion'] ?? ''; ?></textarea> <br>                 
        <label>imagen?:</label><input type="url" name="imagen_url" value="<?php echo $datos_tarea['imagen_url'] ?? ''; ?>">  <br>                 
        <label>echo por:</label><select name="made">
            <option value="Chloe"<?php if (($datos_tarea['made'] ?? '') == 'Chloe') echo 'selected'; ?>>Chloe</option>
            <option value="Shana" <?php if (($datos_tarea['made'] ?? '') == 'Shana') echo 'selected'; ?>>Shana</option>
            <option value="Profesional" <?php if (($datos_tarea['made'] ?? '') == 'Profesional') echo 'selected'; ?>>profesional</option>
        </select>                        <br> 
        <label>asignada a:</label><select name="asignado">
            <option value="Chloe"<?php if (($datos_tarea['asignado'] ?? '') == 'Chloe') echo 'selected'; ?>>Chloe</option>
            <option value="Shana" <?php if (($datos_tarea['asignado'] ?? '') == 'Shana') echo 'selected'; ?>>Shana</option>
            <option value="Profesional" <?php if (($datos_tarea['asignado'] ?? '') == 'Profesional') echo 'selected'; ?>>profesional</option>
        </select>                       <br> 
        <button type="submit" name="tarea" >Guardar tarea (es necesario guardar antes de hacer el paso a paso)</button>

    </form>
    <ol>
        <?php 
        if ($res_pasos) {
            while ($paso = mysqli_fetch_assoc($res_pasos)) {
                echo "<li>Paso " . $paso['orden'] . ": " . $paso['texto'] . "</li>";
            }
        }
        ?>
    </ol>
    <form action="tareas.php" method="POST">
            <input type="hidden" name="id_tareas" value="<?php echo $id_tareas; ?>">
            <input type="number" name="orden" required>        
            <label>paso a paso:</label><input type="text" name="texto" required>     
            <button type="submit" name="paso_a_paso">Guardar paso / sumar paso</button>
    </form>
        

</div>
</body>
>>>>>>> be23cda (actualizacion pasos)
</html>