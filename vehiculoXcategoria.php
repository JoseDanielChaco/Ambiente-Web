<?php require_once "conexion/conexion.php"; ?>
<?php include "template/header.php"; ?>

<script>
    //Este script de abajo ayuda a pasar el id a autoXcategoria para poder filtrarlos
    function selectCategory(categoryId) {
    window.location.href = "vehiculoXcategoria.php?categoria=" + categoryId;
    }
</script>      
        
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
            <img class="card-img-top img-fluid" src="assets/img/<?php echo $data['imagen']; ?>" alt="Imagen de <?php echo $data['nombre']; ?>" style="max-width: 35%; height: auto;" />
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
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a>
                                <a class="btn btn-outline-dark mt-auto favoritos" id="favorito"data-id="<?php echo $data['id']; ?>" href="#">Favoritos</a>
                            </div>
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
