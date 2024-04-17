// Carrito
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.agregar').forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            // Obtener el ID del vehículo seleccionado
            let vehicleId = this.getAttribute('data-id');

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {

                    let response = JSON.parse(xhr.responseText);
                    if (response.success) {

                        alert('Vehículo agregado al carrito correctamente.');
                        let carritoBadge = document.getElementById('carrito');
                        if (carritoBadge) {
                            carritoBadge.textContent = response.total;
                        }
                    } else {
                        alert('Error al agregar el vehículo al carrito.');
                    }
                } else {
                    alert('Error en la solicitud AJAX.');
                }
            };
            xhr.send('action=agregar&data[]=' + encodeURIComponent(vehicleId));
        });
    });

// Favoritos   
    document.querySelectorAll('#favorito').forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            // Obtener el ID del vehículo 
            let vehicleId = this.getAttribute('data-id');
            // Enviar el ID del vehículo al servidor utilizando AJAX
            // Configurar la solicitud AJAX
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'guardar_favorito.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Vehículo agregado a favoritos correctamente.');
                    } else {
                        alert('Error al agregar el vehículo a favoritos.');
                    }
                } else {
                    alert('Error en la solicitud AJAX.');
                }
            };
            xhr.send('action=favoritos&data[]=' + encodeURIComponent(vehicleId));
        });
    });

});

