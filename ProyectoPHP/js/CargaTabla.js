function cargarTabla(tabla) {
    
    $.ajax({
        url: '../CrearTablaDinamico/createTableDB.php',
        type: 'POST',
        data: { tabla: tabla },
        success: function(response) {
            $('#tablaContenedor').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
$(document).ready(function() {
    cargarTabla('ejercicios');
});
