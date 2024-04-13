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
// conexion a la base de datos
require_once "conexion/conexion.php";

 
    if (isset($_GET['categoria'])) {
        $categoriaId = $_GET['categoria'];
        
        // Consultar la base de datos para obtener los vehículos de la categoría especificada y devolver resultados igual que en home.php
        $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria WHERE p.id_categoria = $categoriaId");
        $result = mysqli_num_rows($query);
        
        if ($result > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
?>
                <div class="col mb-5 productos" category="<?php echo $data['categoria']; ?>">
    <div class="card h-100">
        <!-- Venta-->
        <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['Financiado']) ? '' : ''; ?></div>
        <!-- Contenedor de la imagen centrado -->
        <div class="text-center">
            <!-- Imagen -->
            <img class="card-img-top img-fluid" src="assets/img/<?php echo $data['imagen']; ?>" alt="Imagen de <?php echo $data['nombre']; ?>" style="max-width: 15%; height: auto;" />
        </div>
        <!-- Detalles-->
        <div class="card-body p-1">
            <div class="text-center">
                <!-- Nombre Producto-->
                <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>
                <p><?php echo $data['descripcion']; ?></p>
                <!-- Precio Producto-->
                <p>$<?php echo $data['precio_normal']; ?></p>
                <!-- Financiamiento-->
                <p>Financiamiento: $<?php echo $data['Financiado']; ?></p>
                <!-- Reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                </div>
            </div>
        </div>
    </div>
</div>


                <!-- Acciones-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a></div>
                                </div>
                      
    
<?php
            }
        } else {
            // cuando no hay nada para mostrar
            echo "<p>No se encontraron vehículos para esta categoría.</p>";
        }
    } else {
      //cuando no se paga un id de categoria
        echo "<p>Por favor, seleccione una categoría.</p>";
    }
?>
<?php
include "template/footer.php";
?> 