<?php
session_start();
require_once('db.php');

// Verificar si se ha proporcionado un ID de automóvil
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar el automóvil de la base de datos
    $sql_delete = "DELETE FROM productos WHERE id = $id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Automóvil eliminado correctamente.";
        echo '<a href="home.php"><button>Ir a la pagina principal</button></a>';
        echo '<a href="administrar_usuarios.php"><button>Regresar a la pagina anterior</button></a>';
    
    } else {
        echo "Error al eliminar el automóvil: " . $conn->error;
        echo '<a href="home.php"><button>Ir a la pagina principal</button></a>';
        echo '<a href="administrar_usuarios.php"><button>Regresar a la pagina anterior</button></a>';
    
    }
} else {
    echo "ID de automóvil no proporcionado.";
    exit;
}
?>
