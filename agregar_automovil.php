<<<<<<< HEAD
<?php
session_start();
require_once('db.php');
    
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_normal = $_POST['precio_normal'];
    $Financiado = $_POST['financiado'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_POST['imagen'];
    $id_categoria = $_POST['id_categoria']; 

    // Consulta SQL para insertar el automóvil
 
                   $sql_insert = "INSERT INTO productos (id, nombre, descripcion, precio_normal, financiado, cantidad, imagen, id_categoria) 
                   VALUES ('$id','$nombre', '$descripcion', $precio_normal, '$Financiado', '$cantidad', '$imagen', '$id_categoria')";
    

    // Ejecutar la consulta
    if ($conn->query($sql_insert) === TRUE) {
        echo "Automóvil agregado correctamente.";
        echo '<a href="home.php"><button>Ir a la pagina principal</button></a>';
    echo '<a href="administrar_usuarios.php"><button>Regresar a la pagina anterior</button></a>';


    } else {
        echo "Error al agregar el automóvil: " . $conn->error;
        echo '<a href="home.php"><button>Ir a la pagina principal</button></a>';
        echo '<a href="administrar_usuarios.php"><button>Regresar a la pagina anterior</button></a>';
    
    }
}
?>
=======
<?php
session_start();
require_once('db.php');
    
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_normal = $_POST['precio_normal'];
    $financiado = $_POST['financiado'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_POST['imagen'];
    $id_categoria = $_POST['id_categoria']; 

    // Consulta SQL para insertar el automóvil
    $sql_insert = "INSERT INTO productos (nombre, descripcion, precio_normal, financiado, cantidad, imagen, id_categoria) 
                   VALUES ('$nombre', $descripcion, $precio_normal, '$financiado', '$cantidad', '$imagen', '$id_categorias)";

    // Ejecutar la consulta
    if ($conn->query($sql_insert) === TRUE) {
        echo "Automóvil agregado correctamente.";
    } else {
        echo "Error al agregar el automóvil: " . $conn->error;
    }
}
?>
>>>>>>> ddd554144fe2a3c3e727dd31e71bba5bef410613
