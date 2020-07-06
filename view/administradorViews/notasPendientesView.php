{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div id="blog" class="blog col-md-9">
        {{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
        <div class="section-title">
            <h2>Notas Pendientes</h2>
            <p>Haga click en 'ver' para abrir la nota y aprobarla/rechazarla</p>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Sección</th>
                <th>Ubicación</th>
                <th>Autor</th>
                <th>&nbsp;</th>
            </tr>
            <tbody>
            {{# notasPendientesAprobacion}}
            <tr>
                <td>{{titulo}}</td>
                <td>{{seccion_nombre}}</td>

                <td>{{ubicacion_nombre}}</td>
                <td>{{usuario_apellido}}, {{usuario_nombre}}</td>

                <td><a href="/aprobaciones/notaspendientes/{{id}}">Ver</a></td>
            </tr>
            {{/ notasPendientesAprobacion}}
            </tbody>
        </table>
        {{^notasPendientesAprobacion}}
        <h5 class="text-danger ml-5">No hay notas pendientes de aprobación.</h5>
        {{/notasPendientesAprobacion}}
    </div>
</div>
{{> footer}}
