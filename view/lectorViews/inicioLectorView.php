{{> headerLector}}
{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Catalogo de diarios Section ======= -->
    <section id="services" class="services col-md-9 col-sm-12">
        <div class="container" data-aos="fade-up">
            <div class="col-lg-12 data-aos=" fade-left data-aos-delay="100">
                <div class="section-title">
                    <div class="section-title">
                        <h2>Menú principal</h2>
                        <p>Aquí podrá navegar sobre todos las secciones disponibles</p>
                    </div>
                    <div class="row">
                        <!-- Tarjeta de administración -->
                        <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <i class="icofont-files-stack"></i>
                                <h4><a href="/catalogos">Cátalogos de revistas</a></h4>
                                <p>En esta sección podrá acceder a los diferentes agrupaciones de revistas.</p>
                            </div>
                        </div>
                        <!-- Tarjeta de administración -->
                        <div class="col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                             data-aos-delay="300">
                            <div class="icon-box">
                                <i class="icofont-ui-image"></i>
                                <h4><a href="/revistas/misRevistas">Mis Revistas</a></h4>
                                <p>En esta sección podrá acceder a todas las suscripciones disponibles para usted.</p>
                            </div>
                        </div>
                        <!-- Tarjeta de administración -->
                        <div class="col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                             data-aos-delay="500">
                            <div class="icon-box">
                                <i class="icofont-papers"></i>
                                <h4><a href="/publicaciones">Publicaciones</a></h4>
                                <p>En esta sección podrá gestionar sus suscripciones a revistas.</p>
                            </div>
                        </div>
                        <!-- End Tarjeta de administración -->
                        <!-- Tarjeta de administración -->
                        <div class="col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                             data-aos-delay="100">
                            <div class="icon-box">
                                <i class="icofont-plus"></i>
                                <h4><a href="/suscripciones">Mis suscripciones</a></h4>
                                <p>En esta sección podrá gestionar sus suscripciones a revistas.</p>
                            </div>
                        </div>
                        <!-- End Tarjeta de administración -->
                        <!-- Tarjeta de administración -->
                        <div class="col-md-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up"
                             data-aos-delay="300">
                            <div class="icon-box">
                                <i class="icofont-money-bag"></i>
                                <h4><a href="#">Mis Compras</a></h4>
                                <p>En esta sección podrá gestionar sus compras de publicaciones.</p>
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
<script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
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
        // const host = window.location.hostname;
        // const protocol = window.location.protocol;
        {{#usuario}}
            const url = `/api/notas/read.php?id={{id}}`
        {{/usuario}}
        
        fetch(url)
            .then(res => res.json())
            .then(lugares => {

                let ubicacion = {
                    lat: -34.670319,
                    lng: -58.562796
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
          <a href='/nota/vernota?id=${lugar.id}'>Ver más!</a>`
            })

            marcador.addListener('click', () => {
                infoWindow.open(map, marcador)
            })
            return marcador

        })

        var markerCluster = new MarkerClusterer(map, marcadores,
            {
                imagePath: '/images/map/',
                maxZoom: 12
            });


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