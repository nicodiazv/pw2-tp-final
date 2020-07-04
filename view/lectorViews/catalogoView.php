{{> headerLector}}
{{#alert}}
<div class="alert alert-{{class}}" role="alert">
    {{message}}
</div>
{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Mis diarios Section ======= -->
    <section id="blog" class="blog col-md-9">
        <div class="container">
            <div class="row">
                {{#catalogo}}
                <div class="section-title">
                    <h2>Catálogo de {{nombre}}</h2>
                    <p>{{descripcion}}</p>
                </div>
                {{/catalogo}}

                <div class="col-sm-12"><h1>Mis revistas del catálogo</h1></div>
                {{#misRevistasPorCatalogo}}
                <!-- Diario individual -->
                <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-75">

                        <h2 class="entry-title">
                            <a>{{nombre}}</a>
                        </h2>

                        <div class="entry-content">
                            <p>{{descripcion}}</p>
                            <h4><sup>€</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                            <div class="read-more font-weight-bold">
                                <a href="/publicaciones/revista/{{id}}">Ver publicaciones</a>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- End Diario Individual -->
                {{/misRevistasPorCatalogo}}

                {{^misRevistasPorCatalogo}}
                <h5 class="text-danger ml-5" >No posees ninguna revista de este catálogo</h5>
                {{/misRevistasPorCatalogo}}


                <div class="col-sm-12"><h1>Otras revistas</h1></div>
                {{#revistasNoAdquiridasDelCatalogo}}
                <!-- Diario individual -->
                <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-75">

                        <h2 class="entry-title">
                            <a>{{nombre}}</a>
                        </h2>

                        <div class="entry-content">
                            <p>{{descripcion}}</p>
                            <h4><sup>€</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                            <div class="read-more font-weight-bold">
                                <a href="/suscripciones/suscripcionRevista/{{id}}">Suscribirse</a>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- End Diario Individual -->
                {{/revistasNoAdquiridasDelCatalogo}}

            </div>

            {{> footer}}