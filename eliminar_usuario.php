<?php
session_start();
require_once('db.php');

$message = ""; // Variable para almacenar el mensaje de éxito o error

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Eliminar usuario de la base de datos
    $sql_delete = "DELETE FROM usuarios WHERE id = '$user_id'";
    if ($conn->query($sql_delete) === TRUE) {
        $message = "Usuario eliminado correctamente.";
    } else {
        $message = "Error al eliminar el usuario: " . $conn->error;
    }
} else {
    $message = "Solicitud no válida.";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
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
        <a href="administrar_usuarios.php" class="btn">Regresar</a>
    </div>
</body>
</html>
