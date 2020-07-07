{{> headerContenidista}}


<div class="row col-12 justify-content-between">
    {{> sideBarContenidista}}
            <!-- ======= Catalogo de diarios Section ======= -->
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Vista de nota</h2>
                        <p>Nota creada por el contenidista</p>
                    </div>


                    {{# nota}}
                        <div class="row">
                            <h1 class="display-4">{{titulo}}</h1>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <img src="/images/notas/{{imagen_nombre}}" class="rounded mx-auto d-block" style="height: 200px"  alt="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-primary font-weight-bold">{{autor_nombre}} {{auto_apellido}}</div>
                            <div class="col-12">¿Fecha de creación de la nota?</div>
                            <div class="col-12 text-secondary font-weight-light">{{ubicacion_nombre}}</div>

                        </div>

                        <div class="row my-2">
                            <div class="col">
                                <small>
                                    {{copete}}
                                </small>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                {{cuerpo}}

                            </div>
                        </div>

                        <div class="row justify-content-end my-4 mr-4">
                            <!-- <form action="/nota/eliminar/{{id}}">
                                <button class="btn btn-danger mx-1">Eliminar</button>
                            </form> -->
                            {{#aprobada}}
                            <form action="/nota/agregarNotaAPublicacion/{{id}}">
                                <button class="btn btn-success mx-1">Agregar a publicación</button>
                            </form>
                            {{/aprobada}}
                            {{^aprobada}}
                            <form action="/nota/editarNota/{{id}}">
                                <button class="btn btn-success mx-1">Editar</button>
                            </form>
                            {{/aprobada}}
                        </div>
                    {{/ nota}}
                    {{^nota}}
                    <h5 class="text-danger">La nota solicitada no existe!</h5>
                    {{/nota}}


                </div>

                <!--                <div class="column container-fluid">-->
<!--                    <div class="section-title">-->
<!--                        <h2>Solicitar publicación</h2>-->
<!--                        <p>Agregar una nota a una publicacion</p>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div class="">-->
<!---->
<!--                        {{#nota}}-->
<!--                        <h3>{{titulo}}</h3>-->
<!--                        <form action="/nota/agregarAPublicacion/{{id}}">-->
<!--                        {{/nota}}-->
<!--                            <select name="publicacion_id" id="">-->
<!--                                <option value="0">Seleccione una publicación</option>-->
<!--                                {{#publicaciones}}-->
<!--                                <option value="{{id}}">{{nombre}}</option>-->
<!--                                {{/publicaciones}}-->
<!--                            </select>-->
<!--                            <button type="submit" class="btn btn-primary">Solicitar</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
            </section>
            <!-- End Catalogo de diarios -->
        </div>
{{> footer}}
