{{> headerLector}}
{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
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
            <div class="row mt-4 d-flex justify-content-end">
                <div class="col-12 text-secondary font-weight-light">Para más información ingresar en <a
                            href="{{enlance}}">{{enlance}}</a></div>

                <form method="post" id="formularioVotos">
                    <span class="h3 text-success">Votá la nota!</span>
                    <input type="hidden" name="id_nota" value="{{id_nota}}">
                    <!-- Group of default radios - option 1 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input votar" id="defaultGroupExample1" name="puntaje"
                               value="1">
                        <label class="custom-control-label h5" for="defaultGroupExample1">Buena</label>
                    </div>
                    <!-- Group of default radios - option 2 -->
                    <div class="custom-control custom-radio">
                        <input type=f"radio" class="custom-control-input votar" id="defaultGroupExample2" name="puntaje"
                               value="2">
                        <label class="custom-control-label h5" for="defaultGroupExample2">Regular</label>
                    </div>
                    <!-- Group of default radios - option 3 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input votar" id="defaultGroupExample3" name="puntaje"
                               value="3">
                        <label class="custom-control-label h5" for="defaultGroupExample3">Mala</label>
                    </div>
                </form>
            </div>
            <a href="/publicaciones" class="h5">Volver</a>
            {{/ nota}}
            {{^nota}}
            <h5 class="text-danger">La nota solicitada no existe!</h5>
            {{/nota}}
        </div>
    </section>
    <!-- End Catalogo de diarios -->
</div>
{{> footer}}
<script src="/view/js/votos.js"></script>
