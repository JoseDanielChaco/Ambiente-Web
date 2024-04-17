<?php
// Favoritos

if (isset($_POST['action']) && $_POST['action'] === 'favoritos' && isset($_POST['data'])) {

    session_start();
    
    $vehicleId = $_POST['data'][0];

    if (!isset($_SESSION['favoritos'])) {
        // Si no existe, crear un nuevo array para el carrito
        $_SESSION['favoritos'] = array();
    }

    // Agregar el ID del vehículo al carrito
    $_SESSION['favoritos'][] = $vehicleId;

    $response = array(
        'success' => true,
        'total' => count($_SESSION['favoritos']) 
    );
    echo json_encode($response);
} else {
    $response = array(
        'success' => false,
        'message' => 'Solicitud no válida'
    );
    echo json_encode($response);
}

?>