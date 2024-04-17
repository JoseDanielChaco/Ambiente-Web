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
    <!-- Icono de inicio de sesión -->
    <link href="https://unpkg.com/@css.gg/json" rel="stylesheet">
</head>
<body>
    <!-- Icono de inicio de sesión -->
    <link href="https://unpkg.com/@css.gg/json" rel="stylesheet">
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
                    <li><a class="dropdown-item" href="#" onclick="selectCategory(1)">Vehículos Nuevos</a></li>
                    <li><a class="dropdown-item" href="#" onclick="selectCategory(2)">Promociones</a></li>
                    <li><a class="dropdown-item" href="#" onclick="selectCategory(3)">Por Ingresar</a></li>
                     <li><a class="dropdown-item" href="#" onclick="selectCategory(4)">Entrega Inmediata</a></li>
                         </ul>
                    </li>
                </a>
                <script>
                    //este script de abajo ayuda a pasar el id a autoXcategoria para poder filtrarlos
                    function selectCategory(categoryId) {
                    window.location.href = "vehiculoXcategoria.php?categoria=" + categoryId;
                    }
                </script>

                <li class="nav-item">
                <a class="nav-link active" aria-disabled="true" href="contactenos.php">Contáctenos</a>
                </li>
            </ul>
               

            <form class="d-flex" role="search" action="buscaCarro.php" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>

            <!-- Boton inicio sesion-->
            <a href="pre_login.html" class="btn btn-primary">
                <i class="gg-log-in"></i> Iniciar sesión
                </a>
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
  
</style>
<footer class="footer fixed-bottom">   
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="faqs.php" class="text-white">¿Cómo puedo comprar un carro?</a>
                <a href="faqs.html" class="text-white">¿Cuáles son los requisitos para financiamiento?</a>
            </div>
            <div class="col-md-6">
                <h2 class="text-white">Contáctenos</h2>
                <a href="contactenos.php" class="text-white">Envíenos un mensaje</a>
                <a href="tel:+123456789" class="text-white">Llámenos al +(506)123456789</a>
                <p class="m-0 text-center text-white">Copyright &copy; ComproCarroCR</p>
            </div>
        </div>
    </div>
</footer>
