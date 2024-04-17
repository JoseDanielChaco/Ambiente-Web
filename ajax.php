<?php
    // Verificar solicitud AJAX
    if (isset($_POST['action']) && $_POST['action'] === 'agregar' && isset($_POST['data'])) {

        session_start();
        
        $vehicleId = $_POST['data'][0];

        // Verificar si el carrito ya existe en la sesión
        if (!isset($_SESSION['carrito'])) {
            // Si no existe, crear un nuevo array para el carrito
            $_SESSION['carrito'] = array();
        }

        // Agregar el ID del vehículo al carrito
        $_SESSION['carrito'][] = $vehicleId;

        $response = array(
            'success' => true,
            'total' => count($_SESSION['carrito']) 
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
