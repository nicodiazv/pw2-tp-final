{{> headerLector}}

<div class="row col-12 justify-content-between">
    {{> sideBarLector}}

    <!-- ======= Mis diarios Section ======= -->
    <section id="blog" class="blog col-md-9">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Todas las revistas</h2>
                        <p>Aquí podrás encontrar todas las revistas.</p>
                    </div>
                </div>

                <!-- Revistas Adquiridas -->
                <div class="col-sm-12"><h1>Revistas Adquiridas</h1></div>
                {{#revistasAdquiridas}}
                <div class="col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-50">

                        <h2 class="entry-title"><a>{{nombre}}</a></h2>
                        <div class="entry-content">
                            <p>{{descripcion}}</p>
                            <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                            <div class="font-weight-bold">
                                <a href="/publicaciones/publicacion/{{id}}" class="btn btn-primary">Ver publicaciones</a>
                            </div>
                        </div>
                    </article>
                </div>
                {{/revistasAdquiridas}}
                {{^revistasAdquiridas}}
                <h5 class="text-danger ml-5" >No posees ninguna revista</h5>
                {{/revistasAdquiridas}}
                <!-- END Revistas Adquiridas -->

                <!-- Revistas No Adquiridas -->
                <div class="col-sm-12"><h1>Otras Revistas</h1></div>
                {{#revistasNoAdquiridas}}
                <div class="col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                    <article class="entry">

                        <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-50">

                        <h2 class="entry-title"><a>{{nombre}}</a></h2>
                        <div class="entry-content">
                            <p>{{descripcion}}</p>
                            <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>

                            <div class="read-more font-weight-bold">
                                <a href="/suscripciones/suscripcionRevista/{{id}}">Adquirir revista</a>
                            </div>

                        </div>
                    </article>
                </div>
                {{/revistasNoAdquiridas}}
                <!-- END Revistas No Adquiridas -->


            </div>

            {{> footer}}