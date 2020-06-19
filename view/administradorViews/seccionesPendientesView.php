{{> headeradministrador}}

<div class="row justify-content-around">
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
                <td><a href="./aprobarSeccion/{{id}}">Aprobar</a></td>
                <td><a href="./rechazarSeccion/{{id}}">Rechazar</a></td>

            </tr>
            {{/ seccionesPendientesAprobacion}}
            </tbody>
        </table>
    </div>
</div>
{{> footer}}
