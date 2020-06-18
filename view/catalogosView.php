{{> headerLector}}

<div class="row justify-content-around">
    {{> sideBarLector}}
    <!-- ======= Mis diarios Section ======= -->
    <section id="blog" class="blog">
        <div class="container">
            <div class="row">
                {{#catalogo}}
                <div class="section-title">
                    <h2>Catálogo de {{nombre}}</h2>
                    <p>{{descripcion}}</p>
                </div>
                {{/catalogo}}

                {{#revistasPorCatalogo}}
                <!-- Diario individual -->
                <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-75">

                        <h2 class="entry-title">
                            <a>{{nombre}}</a>
                        </h2>

                        <div class="entry-content">
                            <p>
                                Similique neque nam consequuntur ad non maxime aliquam quas
                            </p>
                            <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                            <div class="read-more font-weight-bold">
                                <a href="/suscripciones/suscripcionRevista/{{id}}">Suscribirse</a>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- End Diario Individual -->
                {{/revistasPorCatalogo}}


            </div>

            {{> footer}}