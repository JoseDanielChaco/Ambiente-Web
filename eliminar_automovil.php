<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios y Automóviles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styleAdmin.css" rel="stylesheet" />  
</head>

<?php
session_start();
require_once('db.php');

// Verificar si se ha proporcionado un ID de automóvil
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta para eliminar el automóvil de la base de datos
    $sql_delete = "DELETE FROM productos WHERE id = $id";
    
    if ($conn->query($sql_delete) === TRUE) {
        ?>
        <div class="alert alert-success" role="alert">
            Automóvil eliminado correctamente.
            <a href="home.php" class="btn btn-primary">Ir a la página principal</a>
            <a href="administrar_usuarios.php" class="btn btn-primary">Regresar a la página anterior</a>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Error al eliminar el automóvil: <?php echo $conn->error; ?>
            <a href="home.php" class="btn btn-primary">Ir a la página principal</a>
            <a href="administrar_usuarios.php" class="btn btn-primary">Regresar a la página anterior</a>
        </div>
        <?php
    }
}
    ?>
 