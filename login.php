<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, nombre_usuario, tipo_usuario FROM usuarios WHERE email = '$email' AND contrasena = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        $tipo_usuario = $row['tipo_usuario']; // Obtener el tipo de usuario

        if ($tipo_usuario == 'super') {
            header("Location: administrar_usuarios.php");
        } else {
            header("Location: principal.html");
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
