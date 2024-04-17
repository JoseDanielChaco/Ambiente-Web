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
    <link href="https://unpkg.com/@css.gg/json" rel="stylesheet">
</head>
<body>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-disabled="true" href="contactenos.php">Contáctenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-disabled="true" href="favoritos.php">Favoritos</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="buscaCarro.php" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <a href="pre_login.html" class="btn btn-primary">
                    <i class="gg-log-in"></i> Iniciar sesión
                </a>
            </div>
        </div>
    </nav>

    <script src="ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function selectCategory(categoryId) {
            window.location.href = "vehiculoXcategoria.php?categoria=" + categoryId;
        }
    </script>
</body>
</html>
