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

session_start();


if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

    $carrito = $_SESSION['carrito'];
    require_once "conexion/conexion.php";

    $totalCompra = 0;
    $vehiculos = [];

    foreach ($carrito as $vehiculoId) {
        $query = mysqli_query($conexion, "SELECT nombre, precio_normal, imagen FROM productos WHERE id = $vehiculoId");
        $vehiculo = mysqli_fetch_assoc($query);

        // Sumar el precio del vehículo al total de la compra
        $totalCompra += $vehiculo['precio_normal'];

        // Almacenar la información del vehículo en un array
        $vehiculos[] = $vehiculo;
    }
    ?>
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
  
    echo "<div class='carrito-vehiculos'>";
    foreach ($vehiculos as $vehiculo) {
        echo "<div class='vehiculo'>";
        echo "<img src='assets/img/{$vehiculo['imagen']}' alt='{$vehiculo['nombre']}' style='max-width: 300px; max-height: 300px;' />";
        echo "<p>{$vehiculo['nombre']}</p>";
        echo "<p>Precio: {$vehiculo['precio_normal']}</p>";
        echo "</div>";
    }
    echo "</div>";
?>
</div>
<div class="col-md-4">


    <?php
   
    // monto a pagar
    echo "<div class='carrito-resumen'>";
    echo "<h3>Total de la compra: $totalCompra dolares </h3>";
}
?>
<!-- Manejo de opciones para pago -->


<label for="tipoPago">Tipo de Pago:</label>
<select id="tipoPago" name="tipoPago" onchange="mostrarRecuadro()">
    <option value="Opcion">Escoga una opcion</option>
    <option value="transferencia">Transferencia bancaria</option>
    <option value="tarjeta">Tarjeta de crédito/débito</option>
</select>

<style>
    .textbox {
        width: 300px; /* Ajustar el ancho del textbox según sea necesario */
        margin-bottom: 10px; /* Agregar espacio entre cada textbox */
    }
</style>

<div id="transferenciaBancaria" style="display: none;">
    <h3>Transferencia Bancaria</h3>
    <input type="text" id="nombreTitular" class="textbox" placeholder="Nombre del Titular"><br>
    <input type="text" id="codigoSwift" class="textbox" placeholder="Código Swift o ABA del Banco"><br>
    <input type="text" id="concepto" class="textbox" placeholder="Concepto"><br>
    <input type="text" id="importe" class="textbox" placeholder="Importe"><br>
    <button class="btn btn-secondary" onclick="finalizarPago()">Finalizar pago</button>
</div>

<div id="tarjetaCredito" style="display: none;">
    <h3>Tarjeta de Crédito</h3>
    <input type="text" id="nombreCompleto" class="textbox" placeholder="Nombre Completo"><br>
    <input type="text" id="numeroTarjeta" class="textbox" placeholder="Número de Tarjeta"><br>
    <input type="text" id="fechaVencimientoMes" class="textbox" placeholder="Mes (MM)"><br>
    <input type="text" id="fechaVencimientoAnio" class="textbox" placeholder="Año (YYYY)"><br>
    <input type="text" id="cvv" class="textbox" placeholder="CVV"><br>
    <button class="btn btn-secondary" onclick="finalizarPago()">Finalizar pago</button>
</div>

<script>
function mostrarRecuadro() {
    var tipoPago = document.getElementById("tipoPago").value;
    var transferenciaBancaria = document.getElementById("transferenciaBancaria");
    var tarjetaCredito = document.getElementById("tarjetaCredito");

    if (tipoPago === "transferencia") {
        transferenciaBancaria.style.display = "block";
        tarjetaCredito.style.display = "none";
    } else if (tipoPago === "tarjeta") {
        transferenciaBancaria.style.display = "none";
        tarjetaCredito.style.display = "block";
    }
}

</script>

<!-- Agrega este formulario al final del archivo -->
<form id="formularioPago" method="POST" action="factura.php">
    <input type="hidden" id="nombreCliente" name="nombreCliente">
    <input type="hidden" id="metodoPago" name="metodoPago">
    <input type="hidden" id="fecha" name="fecha">
    <input type="hidden" id="idProducto" name="idProducto">
    <input type="hidden" id="montoPago" name="montoPago">
</form>

<script>
    // Obtener los valores de los campos y enviarlos al servidor cuando se finalice el pago
    function finalizarPago() {
        var tipoPago = document.getElementById("tipoPago").value;
        var nombreCliente = "";
        var metodoPago = "";
        
        if (tipoPago === "transferencia") {
            nombreCliente = document.getElementById("nombreTitular").value;
            metodoPago = "transferenciaBancaria";
        } else if (tipoPago === "tarjeta") {
            nombreCliente = document.getElementById("nombreCompleto").value;
            metodoPago = "tarjetaCredito";
        }

        var fecha = new Date().toISOString().slice(0, 10);
        var idProducto = Math.floor(Math.random() * 4) + 1; // Generar un número aleatorio entre 1 y 4
        var montoPago = <?php echo $totalCompra; ?>; // Obtener el valor de $totalCompra del servidor

        // Asignar los valores a los campos ocultos del formulario
        document.getElementById("nombreCliente").value = nombreCliente;
        document.getElementById("metodoPago").value = metodoPago;
        document.getElementById("fecha").value = fecha;
        document.getElementById("idProducto").value = idProducto;
        document.getElementById("montoPago").value = montoPago;

        // Enviar el formulario
        document.getElementById("formularioPago").submit();
    }
</script>








