<?php
    $conexion = new mysqli("localhost", "root", "", "listatareas", 3307);
   if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
     if (!empty($titulo)) {
    $conexion->query("INSERT INTO tareas (titulo, descripcion)
                      VALUES ('$titulo', '$descripcion')");
  }}

      
$resultado = $conexion->query("SELECT * FROM tareas");
?>       
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ACTIVIDAD DIAGNOSTICO</title>
        </head>
        <body>
            <h1> TO DO LIST</h1>
            <form method="POST">
                <Label for="titulo">Titulo de la tarea</Label><br>
                <input type="text" id="titulo" name="titulo" placeholder="Aqui va tu tarea pendiente">
                <br>
                <label for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" placeholder="Añade tu nota.....">
                <br>
                <button type="submit">Agregar tarea</button>
            </form>
<h3>Lista de tareas</h3>

<table border="1">
  <tr>
    <th>Título</th>
    <th>Descripción</th>
  </tr>

  <?php while($fila = $resultado->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $fila["titulo"]; ?></td>
      <td><?php echo $fila["descripcion"]; ?></td>
    </tr>
  <?php } ?>

</table>
            
           
          
  
        </body>
    </head>
</html>