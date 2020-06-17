{{> headeradministrador}}

<div class="row justify-content-around">
    {{> sideBarAdministrador}}
    <div class="col-md-8">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Sección</th>
                <th>Autor</th>
                <th>&nbsp;</th>
            </tr>
            <tbody>
            {{# notasPendientesAprobacion}}
            <tr>
            <td>{{titulo}}</td>
            <th>{{seccion_nombre}}</th>

            <td>{{usuario_apellido}}, {{usuario_nombre}}</td>
            <td><a href="./notaspendientes/{{id}}">Ver</a></td>


            </tr>
            {{/ notasPendientesAprobacion}}
            </tbody>
        </table>
    </div>
</div>
{{> footer}}
