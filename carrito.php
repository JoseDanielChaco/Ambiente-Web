<?php require_once "conexion/conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />  
    <script src="ajax.js"></script>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <a href="carrito.php" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>
    <!-- Barra Navegacion-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">Compro Carro CR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorías
                </a>
              
                <ul class="dropdown-menu">
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM categorias");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <li><a class="dropdown-item" href="#" onclick="selectCategory('<?php echo $data['categoria']; ?>')"><?php echo $data['categoria']; ?></a></li>
                    <?php } ?>
                </ul>
                </li>

                <li class="nav-item">
                <a class="nav-link active" aria-disabled="true" href="contactenos.php">Contáctenos</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            </div>
        </div>
        </nav>
        
<?php
// Iniciar sesión si aún no está iniciada
session_start();

// Verificar si hay elementos en el carrito
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    // Obtener los vehículos del carrito desde la sesión
    $carrito = $_SESSION['carrito'];

    // Conectar a la base de datos o incluir el archivo de conexión
    require_once "conexion/conexion.php";

    // Mostrar los vehículos en el carrito
    echo "<h2>Carrito de compras</h2>";
    echo "<ul>";
    foreach ($carrito as $vehiculoId) {
        // Obtener información del vehículo desde la base de datos
        $query = mysqli_query($conexion, "SELECT nombre, precio_normal, imagen FROM productos WHERE id = $vehiculoId");
        $vehiculo = mysqli_fetch_assoc($query);

        // Mostrar información del vehículo
        echo "<li>";
        echo "<img src='assets/img/{$vehiculo['imagen']}' alt='{$vehiculo['nombre']}' style='max-width: 100px; max-height: 100px;' />";
        echo "{$vehiculo['nombre']} - Precio: {$vehiculo['precio_normal']}";
        echo "</li>";
    }
    echo "</ul>";

  // Agregar el botón "Vaciar carrito"
  echo "<form method='post'>";
  echo "<button type='submit' name='vaciar' class='btn btn-danger my-button'>Vaciar carrito</button>";
  echo "</form>";

  // Agregar el botón "Continuar con la compra"
  echo "<form action='pago.php' method='get'>";
  echo "<button type='submit' class='btn btn-primary my-button'>Continuar con la compra</button>";
  echo "</form>";

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