<?php require_once "conexion/conexion.php"; ?>
<?php include "template/header.php"; ?>

<script>
    //Este script de abajo ayuda a pasar el id a autoXcategoria para poder filtrarlos
    function selectCategory(categoryId) {
    window.location.href = "vehiculoXcategoria.php?categoria=" + categoryId;
    }
</script>      
        
<?php

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    
    $conn = new mysqli("localhost", "root", "", "proyecto");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT p.*, c.id AS id_cat, c.categoria 
    FROM productos p 
    INNER JOIN categorias c ON c.id = p.id_categoria 
    WHERE p.nombre LIKE '%$search%'";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    // Aqui se muestran los datos con el mismo formato que home y VehiculoXcategoria
    ?>
    <div class="col mb-5 productos" category="<?php echo $row['categoria']; ?>">
        <div class="card h-100">
            <!-- Venta-->
            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($row['precio_normal'] > $row['Financiado']) ? '' : ''; ?></div>
            <!-- Contenedor de la imagen centrado -->
            <div class="text-center">
                <!-- Imagen -->
                <img class="card-img-top img-fluid" src="assets/img/<?php echo $row['imagen']; ?>" alt="Imagen de <?php echo $row['nombre']; ?>" style="max-width: 35%; height: auto;" />
            </div>
            <!-- Detalles-->
            <div class="card-body p-1">
                <div class="text-center">
                    <!-- Nombre Producto-->
                    <h5 class="fw-bolder"><?php echo $row['nombre'] ?></h5>
                    <p><?php echo $row['descripcion']; ?></p>
                    <!-- Precio Producto-->
                    <p>$<?php echo $row['precio_normal']; ?></p>
                    <!-- Financiamiento-->
                    <p>Financiamiento: $<?php echo $row['Financiado']; ?></p>
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
                                </div>
                                
    </div>
    <?php
}
} else {
echo "Oops";
?>
        <!-- Imagen de error -->
        <div class="col mb-5 productos d-flex align-items-center justify-content-center">
        <div class="card h-100">
        <br> </br>
        <img class="card-img-top img-fluid" src="https://i.kym-cdn.com/entries/icons/facebook/000/021/464/14608107_1180665285312703_1558693314_n.jpg" alt="No se encontraron resultados" style="max-width: 100%; height: auto; object-fit: contain;" />
        <div class="card-body p-1">
            <div class="text-center">
                    <p>No encontramos ningun elemento que coincida con tu busqueda </p>
                </div>
            </div>
        </div>
    </div>
    <?php
}


$conn->close();
} else {

echo "Por favor ingresa un término de búsqueda.";
}

include "template/footer.php";
?>


