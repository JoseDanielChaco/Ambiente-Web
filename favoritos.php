<?php require_once "conexion/conexion.php"; ?>
<?php include "template/header.php"; ?>

<script>
    //Este script de abajo ayuda a pasar el id a autoXcategoria para poder filtrarlos
    function selectCategory(categoryId) {
    window.location.href = "vehiculoXcategoria.php?categoria=" + categoryId;
    }
</script>      
        
<?php

// Iniciar sesión si aún no está iniciada
session_start();

// Verificar si hay elementos en el carrito
if (isset($_SESSION['favoritos']) && !empty($_SESSION['favoritos'])) {
    // Obtener los vehículos del carrito desde la sesión
    $favoritos = $_SESSION['favoritos'];

    // Conectar a la base de datos o incluir el archivo de conexión
    require_once "conexion/conexion.php";
?>
<div style="display: flex; justify-content: center; height: 100vh;">
    <div>
        <h2 style="text-align: center;">Favoritos</h2>
        <ul>
            <?php
            foreach ($favoritos as $vehiculoId) {
                // Obtener información del vehículo desde la base de datos
                $query = mysqli_query($conexion, "SELECT nombre, precio_normal, imagen FROM productos WHERE id = $vehiculoId");
                $vehiculo = mysqli_fetch_assoc($query);

                // Mostrar información del vehículo
                echo "<li>";
                echo "<img src='assets/img/{$vehiculo['imagen']}' alt='{$vehiculo['nombre']}' style='max-width: 200px; max-height: 200px;' />";
                echo "{$vehiculo['nombre']} - Precio: {$vehiculo['precio_normal']}";
                echo "</li>";
            }
            ?>
            </ul>
        <div class="button-container">
            <form method="post" style="display: inline;">
                <button type="submit" name="vaciar" class="btn btn-secondary my-button">Vaciar favoritos</button>
            </form>
            <form action="pago.php" method="get" style="display: inline;">
                <button type="submit" class="btn btn-secondary my-button">Continuar con la compra</button>
            </form>
        </div>
    </div>
</div>

<?php
    // Verificar si se ha enviado la solicitud para vaciar el carrito
    if (isset($_POST['vaciar'])) {
        // Vaciar favoritos eliminando todos los vehículos
        unset($_SESSION['favoritos']);
        // Redireccionar a la misma página para actualizar la vista 
        header("Location: favoritos.php");
        exit;
    }
} else {
    // Mostrar un mensaje si está vacío
    echo "<h2>Favoritos</h2>";
    echo "<p>No hay favoritos.</p>";
}
?>
  
  <?php include "template/footer.php"; ?>
