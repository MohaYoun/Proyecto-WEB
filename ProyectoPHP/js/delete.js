function borrarCampo(event) {
    var opcion = confirm("¿Estás seguro de que quieres borrar el campo?");
    if (opcion == false) {
        event.preventDefault();
    }
}
