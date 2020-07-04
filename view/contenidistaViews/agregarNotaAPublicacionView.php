{{> headerContenidista}}

<div class="row col-12 justify-content-between">
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

                <div class="row mb-2">
                    <div class="col-6">

                        <div class="input-group">
                            <select name="publicacion_id" class="custom-select" >
                                <option value="0">Seleccione una publicación</option>
                                {{#publicaciones}}
                                    <option value="{{id}}">{{nombre}}</option>
                                {{/publicaciones}}
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Solicitar</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>Publicacion</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{#notasPublicaciones}}
                            <tr>
                                <td>{{publicacion_nombre}}</td>
                                <td>
                                    {{#aprobada}}
                                        <span class="bg-success text-white p-1 rounded">Aprobada</span>
                                    {{/aprobada}}
                                    {{^aprobada}}
                                        <span class="bg-info text-white p-1 rounded">Pendiente</span>
                                    {{/aprobada}}


                                </td>
                            </tr>
                        {{/notasPublicaciones}}

                    </tbody>
                </table>
            </div>

        </div>
    </section>
    <!-- End Catalogo de diarios -->
</div>
{{> footer}}