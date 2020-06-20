{{> header}}

<div class="row justify-content-around">
    {{> sideBarContenidista}}
            <!-- ======= Catalogo de diarios Section ======= -->
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Mis notas</h2>
                        <p>Notas creadas por el contenidista</p>
                    </div>

                    <div class="">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Sección</th>
                                    <th>Ubicación</th>
                                    <th>Estado</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{#notas}}
                                <tr>
                                    <td>{{titulo}}</td>
                                    <td>{{seccion_nombre}}</td>
                                    <td>{{ubicacion_nombre}}</td>
                                    <td>
                                        {{#aprobada}}
                                        Aprobada
                                        {{/aprobada}}
                                        {{^aprobada}}
                                        Pendiente
                                        {{/aprobada}}

                                    </td>
                                    <td>
                                        <a href="/nota/verNota/{{id}}">Ver</a>
                                    </td>
                                    <td>
                                        {{#aprobada}}
                                        <a href="/nota/agregarNotaAPublicacion/{{id}}">Agregar a Publicación</a>
                                        {{/aprobada}}
                                    </td>
                                </tr>
                            {{/notas}}
                            </tbody>
                        </table>

                    </div>

                </div>
            </section>
            <!-- End Catalogo de diarios -->
</div>
{{> footer}}
