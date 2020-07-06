{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div id="blog" class="blog col-md-9">
        <div class="column container-fluid">
            <div class="section-title">
                <h2>Notas en publicaciones</h2>
                <p>Notas pendientes de aprobación en publicaciones específicas</p>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Sección</th>
                        <th>Ubicación</th>
                        <th>Autor</th>
                        <th>Publicación</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>

                    </tr>
                <tbody>
                    {{# notasEnPublicacionPendientesAprobacion}}
                        <tr>
                            <td>{{titulo}}</td>
                            <td>{{seccion_nombre}}</td>

                            <td>{{ubicacion_nombre}}</td>
                            <td>{{usuario_apellido}}, {{usuario_nombre}}</td>
                            <td>{{publicacion_nombre}}</td>
                            <td></td>
                            <td>
                                <form action="/aprobaciones/aprobarNotaEnNroPublicacion" method="POST">
                                    <input type="hidden" name="nota_id" value="{{nota_id}}">
                                    <input type="hidden" name="publicacion_id" value="{{publicacion_id}}">

                                    <button type="submit" class="btn btn-primary btn-sm">Aprobar</button>
                                </form>
                            </td>
                        </tr>
                        {{/ notasEnPublicacionPendientesAprobacion}}
                </tbody>
            </table>
            {{^notasEnPublicacionPendientesAprobacion}}
            <h5 class="text-danger ml-5">No hay solicitudes pendientes de aprobación.</h5>
            {{/notasEnPublicacionPendientesAprobacion}}
        </div>
    </div>
</div>
{{> footer}}