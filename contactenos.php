<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactenos</title>
</head>
<body>
    <h1>Contactenos</h1>
    <form action="enviar.php" method="post">
        <label for="descripcion">Descripción de su pregunta:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br>
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="telefono">Teléfono:</label><br>
        <input type="tel" id="telefono" name="telefono"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <footer class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <p class="m-0 text-center text-white">Copyright &copy; ComproCarroCR</p>
            </div>
        </div>
    </div>
    </footer>
</body>
</html>