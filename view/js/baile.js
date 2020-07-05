$("#botonPlayMusic").click(() => {
    $('#bailandoMusica').removeAttr('hidden');
    $('#bailandoMusica').show();
});
$("#botonPauseMusic").click(() => {
    $('#bailandoMusica').hide();
});