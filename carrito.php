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
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    // Obtener los vehículos del carrito desde la sesión
    $carrito = $_SESSION['carrito'];

    // Conectar a la base de datos o incluir el archivo de conexión
    require_once "conexion/conexion.php";
?>
<div style="display: flex; justify-content: center; height: 100vh;">
    <div>
        <h2 style="text-align: center;">Carrito de compras</h2>
        <ul>
            <?php
            foreach ($carrito as $vehiculoId) {
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
                <button type="submit" name="vaciar" class="btn btn-secondary my-button">Vaciar carrito</button>
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
        // Vaciar el carrito eliminando todos los vehículos
        unset($_SESSION['carrito']);
        // Redireccionar a la misma página para actualizar la vista del carrito
        header("Location: carrito.php");
        exit;
    }
} else {
    // Mostrar un mensaje si el carrito está vacío
    echo "<h2>Carrito de compras</h2>";
    echo "<p>El carrito está vacío.</p>";
}
?>
  
  <?php include "template/footer.php"; ?>
