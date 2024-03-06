<?php
session_start();
require_once('db.php');

// Verificar si se ha proporcionado un ID de automóvil
if (isset($_GET['id'])) {
    $automovil_id = $_GET['id'];

    // Consulta para eliminar el automóvil de la base de datos
    $sql_delete = "DELETE FROM automoviles WHERE id = $automovil_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Automóvil eliminado correctamente.";
    } else {
        echo "Error al eliminar el automóvil: " . $conn->error;
    }
} else {
    echo "ID de automóvil no proporcionado.";
    exit;
}
?>
