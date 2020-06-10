{{> header}}

<div class="row justify-content-around">

            <!-- Sidebar -->
            <div class="col-lg-2 mt-2 ml-3">

                <h3>{{#usuario}}
                    Bienvenido {{nombre}}
                    {{/usuario}}</h3>
                <h5>Suscriptor</h5>
                <?php   echo $_POST["email"];   ?>
                <a href="/login/cerrarSesion" class="btn btn-outline-dark btn-sm">Cerrar sesión</a>

                <!-- Categorias -->
                <h3 class="h5 mt-5">Categorías de noticias</h3>
                <div class="categories">
                    <ul>
                        <li><a href="#">General <span>(25)</span></a></li>
                        <li><a href="#">Salud <span>(12)</span></a></li>
                        <li><a href="#">Política <span>(14)</span></a></li>
                        <li><a href="#">Deportes <span>(5)</span></a></li>
                        <li><a href="#">Espectáculos <span>(22)</span></a></li>
                    </ul>
                </div>
                <!-- End Categorías-->
                <!-- Clima de google -->
                <div class="">
                    <h1 class="display-4 btn-primary p-4">Clima de Google</h1>
                </div>
                <!-- End Clima de google -->
            </div>
            <!-- End Sidebar -->

            <!-- ======= Catalogo de diarios Section ======= -->
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Catálogo general de diarios</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                            Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                            alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <!-- Tarjeta individual -->
                    <div class="col-md-12 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry d-flex flex-wrap">

                            <img src="" alt="" class="col-12 col-sm-12 col-md-2 img-fluid w-25">

                            <div class="col-12 col-sm-12 col-md-2">
                                <h2 class="entry-title">Revista 1</h2>
                                <p class=" entry-meta d-flex align-items-center"><i class="icofont-user"></i>Autor</p>
                            </div>

                            <div class="col-12 entry-content col-md-8">
                                <p>
                                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                    praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta zena prista
                                    maraeda talan mas indera.
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
                    <!-- Tarjeta individual -->
                    <div class="col-md-12 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry d-flex flex-wrap">

                            <img src="" alt="" class="col-12 col-sm-12 col-md-2 img-fluid w-25">

                            <div class="col-12 col-sm-12 col-md-2">
                                <h2 class="entry-title">Revista 1</h2>
                                <p class=" entry-meta d-flex align-items-center"><i class="icofont-user"></i>Autor</p>
                            </div>

                            <div class="col-12 entry-content col-md-8">
                                <p>
                                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                    praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta zena prista
                                    maraeda talan mas indera.
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
                </div>
            </section>
            <!-- End Catalogo de diarios -->
        </div>
{{> footer}}
