<?php 
include 'conexion.php';
$id_tarea = isset($_GET['id']) ? $_GET['id'] : "";
$nombre = $_POST['nombre'];
$id = $_POST['id'];
$prioridad = $_POST['prioridad'];
$descripcion = $_POST['descripcion'];
$imagen_url = $_POST['imagen_url'];
$made = $_POST['made'];
$asignado = $_POST['asignado'];
$orden = $_POST['orden'];
$texto = $_POST['texto'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div>
    <form action="inicio.php" method="POST">
        <input type="hidden" name="id">               
        <label>Nombre de la tarea:</label><input type="text" name="nombre" required>  <br>                    
        <label>prioridad:</label><select name="prioridad">
            <option value="urgente">Urgente</option>
            <option value="solucionar rapido">Solucionar rapido</option>
            <option value="tranqui">tranqui</option>
            <option value="plata">plata</option>
        </select><br> 
        <label>descripcion:</label><textarea name="descripcion"></textarea> <br>                 
        <label>imagen?:</label><input type="url" name="imagen_url">  <br>                 
        <label>echo por:</label><select name="made">
            <option value="Chloe">Chloe</option>
            <option value="Shana">Shana</option>
            <option value="profesional">profesional</option>
        </select>                        <br> 
        <label>asignada a:</label><select name="asignado">
            <option value="Chloe">Chloe</option>
            <option value="Shana">Shana</option>
            <option value="profesional">profesional</option>
        </select>                       <br> 
        <button type="submit" name="tarea" >Guardar tarea (es necesario guardar antes de hacer el paso a paso</button>

            $_POST['id'];
            $_POST['nombre'];
            $_POST['prioridad'];
            $_POST['descripcion'];
            $_POST['imagen_url'];
            $_POST['made'];

            if empty($id){
            INSERT INTO tareas (nombre, prioridad, descripcion, imagen_url, made, asignado) VALUES ($nombre, prioridad, $descripcion, $imagen_url, $made, $asignado)
            };
            else{
            UPDATE tareas SET nombre = $nombre, prioridad = prioridad, descripcion = $descripcion, imagen_url = $imagen_url, made = $made, asignado = $asignado WHERE id = $id
            };
            IF ...
            $id = mysqli_insert_id($conexion);.
            header("Location: inicio.php?id=" . $id);exit();

    </form>
    <ol></ol>
    <form action="inicio.php" method="POST">
            <input type="hidden" name="id_tareas" value="<?php echo $id_tarea; ?>">
            <input type="number" name="orden" required>        
            <label>paso a paso:</label><input type="text" name="texto" required>     
            <button type="submit" name="paso_a_paso">Guardar paso / sumar paso</button>

            $_POST['asignado'];
            $_POST['orden'];
            $_POST['texto'];

            if empty($id){
            INSERT INTO pasos (id_tareas, orden, texto) VALUES ($id_tarea, $orden, $texto)
            };
            else{
            UPDATE pasos SET id_tareas = $id_tarea, orden = $orden, texto = $texto  WHERE id = $id
            };
    </form>
        

</div>
</body>
</html>