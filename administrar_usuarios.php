<<<<<<< HEAD
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
    <link href="css/styles.css" rel="stylesheet" />  
</head>
<body>
    <h1>Administrar Usuarios</h1>
    
    <!-- Sección para mostrar la lista de usuarios -->
    <h2>Usuarios</h2>
    <table>
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
                    <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Formulario para agregar un nuevo automóvil -->
    <h2>Agregar Nuevo Automóvil</h2>
    <form action="agregar_automovil.php" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br>
        <label for="precio_normal">Precio:</label>
        <input type="text" id="precio_normal" name="precio_normal" required><br>
        <label for="financiado">Financiamiento:</label>
        <input type="text" id="financiado" name="financiado" required><br>
        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad" required><br>
        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" name="imagen" required><br>
        <label for="id_categoria">Categoría:</label>
        <input type="text" id="id_categoria" name="id_categoria" required><br>

        <button type="submit">Agregar Automóvil</button>
    </form>
    
    <!-- Sección para mostrar la lista de automóviles existentes -->
    <h2>Automóviles Existentes</h2>
    <table>
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
                    <a href="editar_automovil.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="eliminar_automovil.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

        <!-- Sección para mostrar el historial de compras -->
        <h2>Historial de Compras</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Fecha de Compra</th>
            <th>Método de Pago</th>
            <th>Monto de Pago</th>
            <th>Id Automóvil</th>
            <th>Id Usuario</th>
        </tr>
        <?php 
        
        // Consulta para obtener el historial de compras
        $sql_historial_compras = "SELECT * FROM historial_compras";
        $result_historial_compras = $conn->query($sql_historial_compras);
        while ($row = $result_historial_compras->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fecha_compra']; ?></td>
                <td><?php echo $row['metodo_pago']; ?></td>
                <td><?php echo $row['monto_pago']; ?></td>
                <td><?php echo $row['producto_id']; ?></td>
                <td><?php echo $row['usuario_id']; ?></td>
                <td>
                    <a href="editar_historial.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="eliminar_historial.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
=======
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
    <link href="css/styles.css" rel="stylesheet" />  
</head>
<body>
    <h1>Administrar Usuarios</h1>
    
    <!-- Sección para mostrar la lista de usuarios -->
    <h2>Usuarios</h2>
    <table>
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
                    <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Formulario para agregar un nuevo automóvil -->
    <h2>Agregar Nuevo Automóvil</h2>
    <form action="agregar_automovil.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br>
        <label for="precio_normal">Precio:</label>
        <input type="text" id="precio_normal" name="precio_normal" required><br>
        <label for="financiado">Financiamiento:</label>
        <input type="text" id="financiado" name="financiado" required><br>
        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad" required><br>
        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" name="imagen" required><br>
        <label for="id_categoria">Categoría:</label>
        <input type="text" id="id_categoria" name="id_categoria" required><br>

        <button type="submit">Agregar Automóvil</button>
    </form>
    
    <!-- Sección para mostrar la lista de automóviles existentes -->
    <h2>Automóviles Existentes</h2>
    <table>
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
                <td><?php echo $row['financiado']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
                <td><?php echo $row['imagen']; ?></td>
                <td><?php echo $row['id_categoria']; ?></td>
                <td>
                    <a href="editar_automovil.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="eliminar_automovil.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

        <!-- Sección para mostrar el historial de compras -->
        <h2>Historial de Compras</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Fecha de Compra</th>
            <th>Método de Pago</th>
            <th>Monto de Pago</th>
            <th>Id Automóvil</th>
            <th>Id Usuario</th>
        </tr>
        <?php 
        
        // Consulta para obtener el historial de compras
        $sql_historial_compras = "SELECT * FROM historial_compras";
        $result_historial_compras = $conn->query($sql_historial_compras);
        while ($row = $result_historial_compras->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fecha_compra']; ?></td>
                <td><?php echo $row['metodo_pago']; ?></td>
                <td><?php echo $row['monto_pago']; ?></td>
                <td><?php echo $row['producto_id']; ?></td>
                <td><?php echo $row['usuario_id']; ?></td>
                <td>
                    <a href="editar_historial.php?id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="eliminar_historial.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
>>>>>>> ddd554144fe2a3c3e727dd31e71bba5bef410613
