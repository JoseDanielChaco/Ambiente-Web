<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $fecha_compra = $_POST['fecha_compra'];
    $metodo_pago = $_POST['metodo_pago'];
    $monto_pago = $_POST['monto_pago'];
    $producto_id = $_POST['producto_id'];
    $usuario_id = $_POST['usuario_id'];
    $historial_id = $_GET['id']; // Obtener el ID del historial de la URL

    // Actualizar información del registro en la base de datos
    $sql_update = "UPDATE historial_compras SET fecha_compra = '$fecha_compra', metodo_pago = '$metodo_pago', monto_pago = '$monto_pago', producto_id = '$producto_id', usuario_id = '$usuario_id' WHERE id = '$historial_id'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar registro: " . $conn->error;
    }
}

// Procesamiento de la solicitud GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $historial_id = $_GET['id'];

    // Obtener información del registro
    $sql = "SELECT * FROM historial_compras WHERE id = '$historial_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $historial = $result->fetch_assoc();
    } else {
        echo "Registro no encontrado.";
        exit;
    }
} else {
    echo "";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Historial</title>
</head>
<body>
    <h1>Editar Historial</h1>
    <form action="editar_historial.php?id=<?php echo $historial_id; ?>" method="post">
        <label for="fecha_compra">Fecha de Compra:</label>
        <input type="text" id="fecha_compra" name="fecha_compra" value="<?php echo $historial['fecha_compra']; ?>" required>
        <label for="metodo_pago">Metodo de Pago:</label>
        <input type="metodo_pago" id="metodo_pago" name="metodo_pago" value="<?php echo $historial['metodo_pago']; ?>" required>
        <label for="monto_pago">Monto de Pago:</label>
        <input type="monto_pago" id="monto_pago" name="monto_pago" value="<?php echo $historial['monto_pago']; ?>" required>
        <label for="producto_id">Producto ID:</label>
        <input type="producto_id" id="producto_id" name="producto_id" value="<?php echo $historial['producto_id']; ?>" required>
        <label for="usuario_id">Usuario ID:</label>
        <input type="usuario_id" id="usuario_id" name="usuario_id" value="<?php echo $historial['usuario_id']; ?>" required>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>