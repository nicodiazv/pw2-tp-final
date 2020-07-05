$(".votar").click(function(){
    // console.log("hola");
    var url = "/votos/guardarvoto";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#formularioVotos").serialize(),
        success: function(data) {
            const yaVoto = JSON.parse(data);
            if(yaVoto){
                $("#formularioVotos").replaceWith(`<p class='h5 text-success font-weight-bold'> El comandante estará eternamente agradecido por tu voto<i class=\"icofont-meetme\"></i></p>`);
                $('#gracias-pa').get(0).play();
            }else{
                $("#formularioVotos").replaceWith(`<p class='h5 text-danger font-weight-bold'>Ya has votado esta nota. </p>`);
                $('#basta-chicos').get(0).play();
            }
        }
    });
});