<?php require_once "conexion/conexion.php"; ?>
<?php include "template/header.php"; ?>

<!-- Botón flotante -->
<a href="carrito.php" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>

<section class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            <?php
            $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
            $result = mysqli_num_rows($query);
            if ($result > 0) {
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <div class="col productos" category="<?php echo $data['categoria']; ?>">
                        <div class="card h-100">
                            <!-- Venta-->
                            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['Financiado']) ? '' : ''; ?></div>
                            <!-- Imagen-->
                            <img class="card-img-top img-fluid" src="assets/img/<?php echo $data['imagen']; ?>" alt="Imagen de <?php echo $data['nombre']; ?>" />
                            <!-- Detalles-->
                            <div class="card-body">
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
                            <!-- Acciones-->
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a>
                                    <a class="btn btn-outline-dark mt-auto favoritos" id="favorito"data-id="<?php echo $data['id']; ?>" href="#">Favoritos</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  }
            } ?>
        </div>
    </div>
</section>

<?php include "template/footer.php"; ?>
