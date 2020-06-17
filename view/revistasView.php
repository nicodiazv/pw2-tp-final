{{> headerLector}}

<div class="row justify-content-around">
{{> sideBarLector}}

        <!-- ======= Mis diarios Section ======= -->
        <section id="blog" class="blog">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>Diarios y Revistas</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>

                    {{#revistas}}
                    <!-- Diario individual -->
                    <div class="col-lg-3 col-md-3 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry">

                            <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-100">


                            <h2 class="entry-title">
                                <a>{{nombre}}</a>
                            </h2>
                            {{#catalogosDeLaRevista}}
<!--                            <p>{{nombre_catalogo}} {{nombre_revista}}</p>-->
                            {{/catalogosDeLaRevista}}
                            <div class="entry-content">
                                <p>
                                    Similique neque nam consequuntur ad non maxime aliquam quas
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