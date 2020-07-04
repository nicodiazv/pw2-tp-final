function habilitar(e) {
    // los deshabilitamos todos
    var inputs = document.querySelectorAll("input[type=text]");

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = true;
    }
    // habilitamos el seleccionado
    document.getElementsByName(e.id)[0].disabled = false;

}