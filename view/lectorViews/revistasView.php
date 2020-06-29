{{> headerLector}}

<div class="row justify-content-between">
{{> sideBarLector}}

        <!-- ======= Mis diarios Section ======= -->
        <section id="blog" class="blog col-md-9">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>Todas las revistas</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>

                    {{#revistas}}
                    <!-- Diario individual -->
                    <div class="col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry">

                            <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-50">

                            <h2 class="entry-title">
                                <a>{{nombre}}</a>
                            </h2>
                            {{#catalogosDeLaRevista}}
<!--                            <p>{{nombre_catalogo}} {{nombre_revista}}</p>-->
                            {{/catalogosDeLaRevista}}
                            <div class="entry-content">
                                <p>
                                    {{descripcion}}
                                </p>
                                <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>

                                <div class="read-more font-weight-bold">
                                    <a href="/suscripciones/suscripcionRevista/{{id}}">Adquirir revista</a>
                                </div>

                            </div>
                        </article>
                    </div>
                    <!-- End Diario Individual -->
                    {{/revistas}}


                </div>

                {{> footer}}