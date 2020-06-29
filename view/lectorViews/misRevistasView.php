{{> headerLector}}

<div class="row justify-content-around">
{{> sideBarLector}}

        <!-- ======= Mis diarios Section ======= -->
        <section id="blog" class="blog col-sm-9">
            <div class="container-fluid">
                <div class="section-title">
                    <h2>Mis Revistas</h2>
                    <p>Aquí podrás ver todas las revistas a las que te encuentras suscrito.</p>
                </div>
                <div class="row">
                    {{#misRevistas}}
                    <!-- Diario individual -->
                    <div class="col-sm-12" data-aos="fade-up">
                        <article class="entry col-sm-12 d-flex">
                            <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-25 mr-5" >
                            <div class="col-sm-10">
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
<!--                                    <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>-->
                                    <div class="read-more font-weight-bold">
                                        <a href="/publicaciones/publicacion/{{id}}">Ver publicaciones de la revista</a>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                    <!-- End Diario Individual -->
                    {{/misRevistas}}


                </div>

                {{> footer}}