{{> header}}

<div class="row justify-content-around">
    {{> sideBarContenidista}}
            <!-- ======= Catalogo de diarios Section ======= -->
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Solicitar publicación</h2>
                        <p>Agregar una nota a una publicacion</p>
                    </div>


                    <div class="">

                        {{#nota}}
                        <h3>{{titulo}}</h3>
                        <form action="/nota/enviarSolicitud" method="post">
                            <input type="hidden" name="nota_id" value="{{id}}">
                        {{/nota}}

                            <select name="publicacion_id" id="">
                                <option value="0">Seleccione una publicación</option>
                                {{#publicaciones}}
                                <option value="{{id}}">{{nombre}}</option>
                                {{/publicaciones}}
                            </select>
                            <button type="submit" class="btn btn-primary">Solicitar</button>
                        </form>
                    </div>

                </div>
            </section>
            <!-- End Catalogo de diarios -->
        </div>
{{> footer}}
