<<<<<<< HEAD
<!DOCTYPE html> 
<?php
include "template/header.php";
?> 
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contáctenos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />  
    </head>
    <body>
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
    </body>
</html>
<?php
include "template/footer.php";
=======
<!DOCTYPE html> 
<?php
include "template/header.php";
?> 
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contáctenos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />  
    </head>
    <body>
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
    </body>
</html>
<?php
include "template/footer.php";
>>>>>>> ddd554144fe2a3c3e727dd31e71bba5bef410613
?> 