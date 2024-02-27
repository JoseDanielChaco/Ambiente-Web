<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = $_GET['id']; // Obtener el ID del usuario de la URL

    // Actualizar información del usuario en la base de datos
    $sql_update = "UPDATE usuarios SET nombre_usuario = '$nombre', email = '$email', contrasena = '$password' WHERE id = '$user_id'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}

// Procesamiento de la solicitud GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Obtener información del usuario
    $sql = "SELECT * FROM usuarios WHERE id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado.";
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
    <title>Editar Usuario</title>
    <!-- Agrega aquí tus estilos CSS -->
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="editar_usuario.php?id=<?php echo $user_id; ?>" method="post">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $user['nombre_usuario']; ?>" required>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" value="<?php echo $user['contrasena']; ?>" required>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
