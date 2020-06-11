{{> headerLector}}

<div class="row justify-content-around">
    {{> sideBarLector}}
    <!-- ======= Catalogo de diarios Section ======= -->
    <section id="blog" class="blog col-md-9">
        <div class="column container-fluid">
            <div class="section-title">
                <h2>Catálogos de diarios y revistas</h2>
                <p>Esta es la sección inicial donde podrá ver una lista de catálogos disponibles, los cuáles agruparán revistas y diarios según sus contenidos</p>
            </div>
            <!-- Tarjeta individual -->
            {{#catalogos}}
            <div class="col-md-12 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry d-flex flex-wrap">

                    <img src="" alt="" class="col-12 col-sm-12 col-md-2 img-fluid w-25">

                    <div class="col-12 col-sm-12 col-md-2">
                        <h2 class="entry-title">{{nombre}}</h2>
                        <p class=" entry-meta d-flex align-items-center">Catálogo</p>
                    </div>

                    <div class="col-12 entry-content col-md-8">
                        <p>{{descripcion}}</p>
                        <div class="read-more col-12 row justify-content-end ">
                            <a href="../../index.php" class="font-weight-bold mt-2 mr-5">Ver revistas</a>
                        </div>
                    </div>
                </article>
            </div>
            {{/catalogos}}
            <!-- Fin diario individual -->
        </div>
    </section>
    <!-- End Catalogo de diarios -->
</div>
{{> footer}}
