<<<<<<< HEAD
<?php
    $host = "localhost";
    $user = "root";
    $clave = "";
    $bd = "proyecto";
    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");


function Desconectar($conexion) {
    mysqli_close($conexion);
=======
<?php
    $host = "localhost";
    $user = "root";
    $clave = "NoE.021!";
    $bd = "proyecto";
    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");


function Desconectar($conexion) {
    mysqli_close($conexion);
>>>>>>> ddd554144fe2a3c3e727dd31e71bba5bef410613
}