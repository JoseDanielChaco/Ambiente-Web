<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['emailRegistro'];
    $password = $_POST['passwordRegistro'];

    // Verificar si el correo electrónico ya está en uso
    $check_email_query = "SELECT * FROM usuarios WHERE email = '$email'";
    $check_email_result = $conn->query($check_email_query);
    if ($check_email_result->num_rows > 0) {
        echo "El correo electrónico ya está en uso.";
    } else {
        // Insertar nuevo usuario si el correo electrónico no está en uso
        $insert_user_query = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES ('$nombre', '$email', '$password')";
        if ($conn->query($insert_user_query) === TRUE) {
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['nombre_usuario'] = $nombre;
            header("Location: login.html");
        } else {
            echo "Error: " . $insert_user_query . "<br>" . $conn->error;
        }
    }
}
?>
