{{> headerLector}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Catalogo de diarios Section ======= -->

    <section id="blog" class="blog col-md-9">
        <div class="column container-fluid">
            <div class="section-title">
                {{#publicacion}}
                <h2>{{nombre}}</h2>
                <h4>Fecha de publicación: {{fecha_publicacion}}</h4>
                {{/publicacion}}
            </div>
            <div class="card-deck">
                {{#notasDePublicacion}}
                <div class="col-3 mb-4">

                    <div class="card">
                        <img class="card-img-top" src="/images/notas/{{imagen_nombre}}" alt="Card image cap"/>
                        <div class="card-body pb-1">
                            <h5 class="card-title"><strong>{{titulo}}</strong></h5>
                            <p class="card-text ">{{copete}}</p>
                            <a href="/nota/verNota/{{id}}" class="btn btn-info">Leer</a>
                        </div>
                    </div>
                </div>
                {{/notasDePublicacion}}
            </div>
            {{^notasDePublicacion}}
            <h5 class="text-danger ml-5">Esta publicación aún no posee notas.</h5>
            {{/notasDePublicacion}}
            <a href="/publicaciones" class="h5">Volver</a>
        </div>

</div>
</section>
<!-- End Catalogo de diarios -->

</div>
{{> footer}}
