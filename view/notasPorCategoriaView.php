{{> header}}

<div class="row justify-content-around">
    {{> sideBarContenidista}}
            <!-- ======= Catalogo de diarios Section ======= -->
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Notas escritas</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>

                    {{#notas}}
                    <!-- Tarjeta individual -->
                    <div class="col-md-12 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry d-flex flex-wrap">

                            <img src="/images/notas/{{imagen_nombre}}" alt="" class="col-12 col-sm-12 col-md-2 img-fluid w-25">

                            <div class="col-12 col-sm-12 col-md-2">
                                <h2 class="entry-title">{{titulo}}</h2>
                                <p class=" entry-meta d-flex align-items-center"><i class="icofont-user"></i>Autor</p>
                            </div>

                            <div class="col-12 entry-content col-md-8">
                                <p>
                                    {{cuerpo}}
                                </p>
                                <div class="read-more col-12 row justify-content-end ">
                                    <a href="suscripcion-diario.html" class="font-weight-bold mt-2 mr-4">Suscripción
                                        Mensual</a>
                                    <a href="suscripcion-diario.html" class="font-weight-bold mt-2 mr-5">Comprar
                                        Diario</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Fin diario individual -->
                    {{/notas}}
                </div>
            </section>
            <!-- End Catalogo de diarios -->
        </div>
{{> footer}}
