<?php
session_start();
require_once('db.php');

// Consulta para obtener todos los usuarios
$sql_usuarios = "SELECT * FROM usuarios";
$result_usuarios = $conn->query($sql_usuarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios y Automóviles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styleAdmin.css" rel="stylesheet" />  
</head>
<body class=container>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Volver al Inicio</a>
          
    <h1 >Pagina para Administrar Usuarios</h1>
           
    
    <!-- Sección para mostrar la lista de usuarios -->
    <h2>Usuarios</h2>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result_usuarios->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre_usuario']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Formulario para agregar un nuevo automóvil -->
    <h2>Agregar Nuevo Automóvil</h2>
<form action="agregar_automovil.php" method="post">
    <div class="form-group">
        <label for="id" class="form-label">ID:</label>
        <input type="text" id="id" name="id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="descripcion" class="form-label">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="precio_normal" class="form-label">Precio:</label>
        <input type="text" id="precio_normal" name="precio_normal" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="financiado" class="form-label">Financiamiento:</label>
        <input type="text" id="financiado" name="financiado" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="cantidad" class="form-label">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="imagen" class="form-label">Imagen:</label>
        <input type="text" id="imagen" name="imagen" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="id_categoria" class="form-label">Categoría:</label>
        <input type="text" id="id_categoria" name="id_categoria" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Agregar Automóvil</button>
</form>

    
    <!-- Sección para mostrar la lista de automóviles existentes -->
    <h2>Automóviles Existentes</h2>
    <table class="table table-striped">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Financiamiento</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Consulta para obtener los automóviles existentes
        $sql_productos = "SELECT * FROM productos";
        $result_productos = $conn->query($sql_productos);
        
        // Mostrar los automóviles en la tabla
        while ($row = $result_productos->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['precio_normal']; ?></td>
                <td><?php echo $row['Financiado']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
                <td><?php echo $row['imagen']; ?></td>
                <td><?php echo $row['id_categoria']; ?></td>
                <td>
                <a href="editar_automovil.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="eliminar_automovil.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

        <!-- Sección para mostrar el historial de compras -->
<h2>Historial de Compras</h2>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Fecha de Compra</th>
        <th>Nombre del Cliente</th>
        <th>Método de Pago</th>
        <th>Monto de Pago</th>
        <th>ID Automóvil</th>
    </tr>
    <?php 
    
    // Consulta para obtener el historial de compras
    $sql_historial_compras = "SELECT * FROM factura";
    $result_historial_compras = $conn->query($sql_historial_compras);
    while ($row = $result_historial_compras->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['nombre_cliente']; ?></td>
            <td><?php echo $row['metodo_pago']; ?></td>
            <td><?php echo $row['monto_pago']; ?></td>
            <td><?php echo $row['producto_id']; ?></td>
            <td>
                
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
