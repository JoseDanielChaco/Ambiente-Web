<?php
session_start();
require_once('db.php');

$message = ""; // Variable para almacenar el mensaje de éxito o error

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_normal = $_POST['precio_normal'];
    $Financiado = $_POST['financiado'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_POST['imagen'];
    $id_categoria = $_POST['id_categoria']; 

    // Consulta SQL para insertar el automóvil
    $sql_insert = "INSERT INTO productos (id, nombre, descripcion, precio_normal, financiado, cantidad, imagen, id_categoria) 
                   VALUES ('$id','$nombre', '$descripcion', $precio_normal, '$Financiado', '$cantidad', '$imagen', '$id_categoria')";

    // Ejecutar la consulta
    if ($conn->query($sql_insert) === TRUE) {
        $message = "Automóvil agregado correctamente.";
    } else {
        $message = "Error al agregar el automóvil: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Automóvil</title>
    <link href="css/styles.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $message; ?></h1>
        <a href="home.php" class="btn">Ir a la página principal</a>
        <a href="administrar_usuarios.php" class="btn">Regresar a la página anterior</a>
    </div>
</body>
</html>
