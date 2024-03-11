document.addEventListener('DOMContentLoaded', function() {
    // Capturar clic del botón "Agregar"
    document.querySelectorAll('.agregar').forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            // Obtener el ID del vehículo seleccionado
            let vehicleId = this.getAttribute('data-id');
            // Enviar el ID del vehículo al servidor utilizando AJAX
            // Configurar la solicitud AJAX
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // Manejar la respuesta AJAX
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Verificar si la respuesta es válida
                    let response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Notificar al usuario que se agregó el vehículo al carrito
                        alert('Vehículo agregado al carrito correctamente.');
                        // Actualizar el contador del carrito en la interfaz (opcional)
                        // Puedes actualizar el contador del carrito mostrando el número de elementos en el carrito
                        let carritoBadge = document.getElementById('carrito');
                        if (carritoBadge) {
                            carritoBadge.textContent = response.total;
                        }
                    } else {
                        // Notificar al usuario si ocurrió un error al agregar el vehículo al carrito
                        alert('Error al agregar el vehículo al carrito.');
                    }
                } else {
                    // Notificar al usuario si ocurrió un error en la solicitud AJAX
                    alert('Error en la solicitud AJAX.');
                }
            };
            // Enviar la solicitud AJAX con el ID del vehículo
            xhr.send('action=agregar&data[]=' + encodeURIComponent(vehicleId));
        });
    });
});
