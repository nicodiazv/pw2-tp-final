{{> headerLector}}


<div class="row justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Catalogo de diarios Section ======= -->
    {{#nota}}
    <section id="blog" class="blog col-md-9">
        <div class="column container-fluid">

            <div class="row">
                <h1 class="display-5">{{titulo}}</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <img src="/images/notas/{{imagen_nombre}}" class="rounded mx-auto d-block" style="height: 200px"
                         alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-primary font-weight-bold">{{autor_nombre}}, {{autor_apellido}}</div>
                <div class="col-12 text-secondary font-weight-light">{{ubicacion_nombre}}</div>


            </div>

            <div class="row my-2">
                <div class="col">
                    <small>{{copete}}</small>
                </div>

            </div>
            <div class="row">
                <div class="col">{{cuerpo}}</div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-secondary font-weight-light">Para más información ingresar en <a href="{{enlance}}">{{enlance}}</a></div>
            </div>

            {{/ nota}}
            {{^nota}}
            <h1>La nota solicitada no existe!</h1>
            {{/nota}}
        </div>
    </section>
    <!-- End Catalogo de diarios -->
</div>
{{> footer}}
