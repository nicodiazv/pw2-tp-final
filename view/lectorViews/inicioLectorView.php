{{> headerLector}}

<div class="row justify-content-around">
  {{> sideBarLector}}
  <!-- ======= Catalogo de diarios Section ======= -->
  <section id="services" class="services col-md-9">
    <div class="container" data-aos="fade-up">
      <div class="col-lg-12 data-aos=" fade-left data-aos-delay="100">
        {{#alert}}
          <div class="alert alert-{{class}}" role="alert">
            <p>{{message}}</p>
          </div>
        {{/alert}}
        <div class="section-title">
          <div class="section-title">
            <h2>Contenidos</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
              consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
              sit in iste officiis commodi quidem hic quas.</p>
          </div>
          <div class="row">
            <!-- Tarjeta de administración -->
            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <i class="icofont-computer"></i>
                <h4><a href="/catalogos">Cátalogos</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque, delectus eligendi excepturi maxime optio.</p>
              </div>
            </div>
            <!-- Tarjeta de administración -->
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <i class="icofont-chart-bar-graph"></i>
                <h4><a href="/revistas/misRevistas">Mis Revistas</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque, delectus eligendi excepturi maxime optio saepe </p>
              </div>
            </div>
            <!-- End Tarjeta de administración -->
            <!--
                        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                          <div class="icon-box">
                            <i class="icofont-chart-bar-graph"></i>
                            <h4><a href="#">Crear nota dentro de una revista existente</a></h4>
                            <p>En esta sección usted podrá crear notas para diarios o revistas. El estado de estas pasará a
                              pendientes de aprobación.</p>
                          </div>
                        </div>
                        -->
            <!-- Tarjeta de administración -->
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <i class="icofont-chart-bar-graph"></i>
                <h4><a href="/suscripciones">Mis suscripciones</a></h4>
                <p>En esta sección usted podrá crear notas. El estado de estas pasará a
                  pendientes de aprobación.</p>
              </div>
            </div>
            <!-- End Tarjeta de administración -->
            <!-- Tarjeta de administración -->
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <i class="icofont-newspaper"></i>
                <h4><a href="#">Mis Compras</a></h4>
                <p>En este apartado usted podrá crear secciones, las cuales le permitirán agrupar notas dentro
                  de las publicaciones. Una vez creadas las secciones, el estado de estas pasará a
                  pendientes de aprobación.</p>
              </div>
            </div>
            <!-- End Tarjeta de administración -->
          </div>
        </div>
      </div>
    </div>



    <h2>Notas en el mapa</h2>

    <div id="map" style="height: 80vh; width: 80vw;"></div>

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