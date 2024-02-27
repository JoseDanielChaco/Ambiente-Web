<?php
// Configuración de la base de datos
$servidor = "localhost";
$base_datos = "Logins"; // Aquí cambia el nombre de la base de datos
$usuario = "root";
$contrasena = "";

// Conexión a la base de datos
try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$base_datos", $usuario, $contrasena);
    // Habilitar mensajes de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
