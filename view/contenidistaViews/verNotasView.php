{{> headerContenidista}}

{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarContenidista}}
    <!-- ======= Catalogo de diarios Section ======= -->
    <section id="blog" class="blog col-md-9">
        <div class="column container-fluid">
            <div class="section-title">
                <h2>Notas generadas</h2>
                <p>Notas creadas por el contenidista</p>
            </div>

            <div class="row justify-content-start mb-2">
                <div class="col-3">
                    <a class="btn btn-success btn-block" href="/nota/crearNota">Crear Nota</a>
                </div>
            </div>
            <div class="row">

                <div class="col-12">

                    <table id="dataTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Sección</th>
                            <th>Ubicación</th>
                            <th>Estado</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{#notas}}
                        <tr>
                            <td><a href="/nota/verNota/{{id}}">{{titulo}}</a></td>
                            <td>{{seccion_nombre}}</td>
                            <td>{{ubicacion_nombre}}</td>
                            <td>
                                {{#aprobada}}
                                <span id="estado" class="bg-success text-white p-1 rounded">Habilitada</span>
                                {{/aprobada}}
                                {{^aprobada}}
                                <span class="bg-danger text-white p-1 rounded">Deshabilitada</span>
                                {{/aprobada}}
                            </td>
                            <td>
                                {{#aprobada}}
                                <a href="/nota/agregarNotaAPublicacion/{{id}}">Agregar a Publicación</a>
                                {{/aprobada}}
                                {{^aprobada}}
                                <a href="/nota/editarNota/{{id}}">Editar</a>
                                {{/aprobada}}
                            </td>
                        </tr>
                        {{/notas}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

</div>
</section>
<!-- End Catalogo de diarios -->
</div>

{{> footer}}
