<?php
session_start();
require_once('db.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_normal = $_POST['precio_normal'];
    $financiado = $_POST['financiado'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_POST['imagen'];
    $id_categoria = $_POST['id_categoria']; 
    $producto_id = $_GET['id']; // Obtener el ID del automóvil de la URL


    // Actualizar los datos del automóvil en la base de datos
    $sql_update = "UPDATE productos SET nombre = '$nombre', descripcion ='$descripcion', precio_normal = '$precio_normal', financiado = '$financiado', cantidad = '$cantidad', imagen = '$imagen', id_categoria = '$id_categoria' WHERE id = $productos_id";
    if ($conn->query($sql_update) === TRUE) {
        echo "Automóvil actualizado correctamente.";
    } else {
        echo "Error al actualizar el automóvil: " . $conn->error;
    }
}

// Consulta para obtener la información del automóvil seleccionado
if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    $sql_producto = "SELECT * FROM productos WHERE id = $producto_id";
    $result_producto = $conn->query($sql_producto);

    if ($result_producto->num_rows == 1) {
        $producto = $result_producto->fetch_assoc();
    } else {
        echo "Automóvil no encontrado.";
        exit;
    }
} else {
    echo "ID de automóvil no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Automóvil</title>
</head>
<body>
    <h1>Editar Automóvil</h1>
    <form action="editar_automovil.php?id=<?php echo $automovil_id; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required><br>
        <label for="precio_normal">Precio:</label>
        <input type="text" id="precio_normal" name="precio_normal" value="<?php echo $producto['precio_normal']; ?>" required><br>
        <label for="financiado">Financiamiento:</label>
        <input type="text" id="financiado" name="financiado" value="<?php echo $producto['financiado']; ?>" required><br>
        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required><br>
        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" name="imagen" value="<?php echo $producto['imagen']; ?>" required><br>
        <label for="id_categoria">Categoría:</label>
        <input type="text" id="id_categoria" name="id_categoria" value="<?php echo $producto['id_categoria']; ?>" required><br>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
