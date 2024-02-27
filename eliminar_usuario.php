<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Eliminar usuario de la base de datos
    $sql_delete = "DELETE FROM usuarios WHERE id = '$user_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }
} else {
    echo "Solicitud no válida.";
    exit;
}
?>
