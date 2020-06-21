{{> headerLector}}

<div class="row justify-content-around">
  {{> sideBarLector}}
  <!-- ======= Catalogo de diarios Section ======= -->
  <section id="blog" class="blog col-md-9">
    <div class="column container-fluid">
      <div class="section-title">
        <h2>Catálogos de diarios y revistas</h2>
        <p>Esta es la sección inicial donde podrá ver una lista de catálogos disponibles, los cuáles agruparán revistas y diarios según sus contenidos</p>
      </div>

      <div id="map" style="height: 80vh;
    width: 80vw;"></div>

    </div>
  </section>
  <!-- End Catalogo de diarios -->
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk95kpZ90NBtlkoHX3MrerMAzHVokLInc" defer></script>
<script>
  // navigator.geolocation.getCurrentPosition(posicionUsuario => {
  //   let ubicacion = {
  //     lat: posicionUsuario.coords.latitude,
  //     lng: posicionUsuario.coords.longitude,

  //   }
  //   
  // })
  document.addEventListener("DOMContentLoaded", () => {

    fetch("http://localhost/pw2-final/api/notas/read.php")
      .then(res => res.json())
      .then(lugares => {

        let ubicacion = {
          lat: -34.637139,
          lng: -54.496574
        }
        // console.log(data)
        dibujarMapa(ubicacion, lugares)

      })

  })

  const dibujarMapa = (posicionUsuario, lugares) => {

    let map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: posicionUsuario.lat,
        lng: posicionUsuario.lng
      },
      zoom: 8
    });

    let marcadorUsuario = new google.maps.Marker({
      position: posicionUsuario,
      title: 'Mi ubicacion',
      icon: '/images/map/user.png'
    })

    marcadorUsuario.setMap(map)

    let marcadores = lugares.map(lugar => {
      let marcador = addMarker(lugar, map);
     
      let infoWindow = new google.maps.InfoWindow({
        content: `<h1>${lugar.titulo}</h1>
          <p>${lugar.copete}</p>
          <a href='http://pw2-final.test/nota/vernota?id=${lugar.id}'>Ver más!</a>`
      })

      marcador.addListener('click', () => {
        infoWindow.open(map, marcador)
      })

    })

  }

  const addMarker = (lugar, map) => {
    return new google.maps.Marker({
      position: lugar.posicion,
      title: lugar.nombre,
      map: map
    })
  }

</script>
{{> footer}}