{{> headeradministrador}}
{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div class="col-md-8 my-4">
        <h1 class="display-4">Secciones Pendientes</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                 <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <tbody>
            {{# seccionesPendientesAprobacion}}
            <tr>
                <td>{{nombre}}</td>
                <td><a href="/aprobaciones/aprobarSeccion/{{id}}">Aprobar</a></td>
                <td><a href="/aprobaciones/rechazarSeccion/{{id}}">Rechazar</a></td>

            </tr>
            {{/ seccionesPendientesAprobacion}}
            </tbody>
        </table>
        {{^seccionesPendientesAprobacion}}
        <h5 class="text-danger ml-5">No hay secciones pendientes de aprobación.</h5>
        {{/seccionesPendientesAprobacion}}
    </div>
</div>
{{> footer}}
