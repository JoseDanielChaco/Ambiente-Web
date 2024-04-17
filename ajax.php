<?php
    // Verificar si se recibió una solicitud AJAX
    if (isset($_POST['action']) && $_POST['action'] === 'agregar' && isset($_POST['data'])) {
        // Iniciar o reanudar la sesión
        session_start();
        
        // Obtener el ID del vehículo a agregar al carrito
        $vehicleId = $_POST['data'][0];

        // Aquí puedes realizar cualquier lógica adicional, como verificar si el vehículo existe en la base de datos, etc.
        // Por ahora, simplemente lo agregaremos al carrito de la sesión

        // Verificar si el carrito ya existe en la sesión
        if (!isset($_SESSION['carrito'])) {
            // Si no existe, crear un nuevo array para el carrito
            $_SESSION['carrito'] = array();
        }

        // Agregar el ID del vehículo al carrito
        $_SESSION['carrito'][] = $vehicleId;

        // Enviar una respuesta JSON indicando que se agregó el vehículo al carrito
        $response = array(
            'success' => true,
            'total' => count($_SESSION['carrito']) // Puedes enviar el número total de elementos en el carrito
        );
        echo json_encode($response);
    } else {
        // Si la solicitud no es válida, enviar una respuesta JSON con error
        $response = array(
            'success' => false,
            'message' => 'Solicitud no válida'
        );
        echo json_encode($response);
    }

?>
