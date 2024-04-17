<?php require_once "conexion/conexion.php"; ?>
<?php include "template/header.php"; ?>

<script>
    // Este script de abajo ayuda a pasar el id a autoXcategoria para poder filtrarlos
    function selectCategory(categoryId) {
        window.location.href = "vehiculoXcategoria.php?categoria=" + categoryId;
    }
</script>      

<div class="container">
    <h1>Contáctenos</h1>
    <form action="enviar.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono"><br><br>
        <label for="descripcion">Escriba su mensaje:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Enviar">
    </form>
</div>

<?php include "template/footer.php"; ?>