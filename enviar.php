<?php
require_once "conexion/conexion.php"; 

// Recuperar los datos del formulario
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Preparar la consulta SQL para insertar los datos en la tabla de contactos
$sql = "INSERT INTO contactos (descripcion, nombre, email, telefono) VALUES ('$descripcion', '$nombre', '$email', '$telefono')";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    echo "¡Su pregunta se ha enviado correctamente!";
} else {
    echo "Error al enviar su pregunta: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>