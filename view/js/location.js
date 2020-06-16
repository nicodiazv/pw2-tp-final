(function () {
    function init () {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setPosition);
        }
        else
        {
            alert("Error al obtener localización para obtener el clima local");
        }
    }
    window.onload = init;
}())


function setPosition(position)
{
    document.getElementById("lat").value = position.coords.latitude;
    document.getElementById("long").value = position.coords.longitude;
}
