function buscarLugar(){
    const ubicacion = document.getElementById('ubicacion')
    const place_id = document.getElementById('place_id')
    const lat = document.getElementById('lat')
    const lng = document.getElementById('lng')


    const autocomplete = new google.maps.places.Autocomplete(ubicacion,{types: ['geocode']})

    autocomplete.setFields([
        'adr_address',
        'place_id',
        'address_components',
        'formatted_address',
        'geometry'])

    autocomplete.addListener('place_changed', () =>{
        const result = autocomplete.getPlace()

        const lugar = {
            "place_id" : result.place_id,
            "nombre" : result.formatted_address,
            "lat" : result.geometry.location.lat(),
            "lng": result.geometry.location.lng()
        }
        place_id.value = lugar.place_id;
        lat.value = lugar.lat;
        lng.value = lugar.lng;

        console.log(lugar)

    })
}