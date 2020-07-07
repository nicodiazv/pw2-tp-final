{{> headerContenidista}}


<div class="row col-12 justify-content-between">
    {{> sideBarContenidista}}
            <!-- ======= Catalogo de diarios Section ======= -->
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Revistas generadas</h2>
                        <p>Revistas creadas por el contenidista</p>
                    </div>

                    <div class="row justify-content-start mb-2">
                        <div class="col-3">
                            <a class="btn btn-success btn-block" href="/revistas/crearRevista">Crear Revista</a>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio Mensual</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{#revistas}}
                                    <tr>
                                        <td><a href="/revistas/verRevista/{{id}}">{{nombre}}</a></td>
                                        <td>{{descripcion}}</td>
                                        <td>€ {{precio_suscripcion_mensual}}</td>
                                        <td>
                                            {{#aprobada}}
                                           <span class="bg-success text-white p-1 rounded">Aprobada</span>
                                            {{/aprobada}}
                                            {{^aprobada}}
                                           <span class="bg-info text-white p-1 rounded">Pendiente</span>
                                            {{/aprobada}}
                                        </td>
                                    </tr>
                                {{/revistas}}
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
