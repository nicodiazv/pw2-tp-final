{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div class="col-md-8 my-4">
        
        {{#alert}}
        <div class="alert alert-{{class}}" role="alert">
            {{message}}
        </div>
        {{/alert}}
        
        <h1 class="display-4">Revistas Pendientes</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Precio Mensual Solicitado</th>
                <th>Autor</th>
                <th></th>
            </tr>
            <tbody>
            {{# revistasPendientesAprobacion}}
            <tr>
                <td>{{nombre_revista}}</td>
                <td>${{precio_mensual}}</td>
                <td>{{apellido_usuario}}, {{nombre_usuario}}</td>
                <td><a href="./revistaPendiente/{{id_re}}">Ver</a></td>
            </tr>
            {{/ revistasPendientesAprobacion}}
            </tbody>
        </table>
    </div>
</div>
{{> footer}}
