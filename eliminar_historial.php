<<<<<<< HEAD
<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $historial_id = $_GET['id'];

    // Eliminar registro de la base de datos
    $sql_delete = "DELETE FROM historial_compras WHERE id = '$historial_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar registro: " . $conn->error;
    }
} else {
    echo "Solicitud no válida.";
    exit;
}
=======
<?php
session_start();
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $historial_id = $_GET['id'];

    // Eliminar registro de la base de datos
    $sql_delete = "DELETE FROM historial_compras WHERE id = '$historial_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar registro: " . $conn->error;
    }
} else {
    echo "Solicitud no válida.";
    exit;
}
>>>>>>> ddd554144fe2a3c3e727dd31e71bba5bef410613
?>