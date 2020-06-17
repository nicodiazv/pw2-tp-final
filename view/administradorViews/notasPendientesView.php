{{> headeradministrador}}

<div class="row justify-content-around">
    {{> sideBarAdministrador}}
    <div class="col-md-8 my-4">
        <h1 class="display-4">Notas Pendientes</h1>
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

                <td><a href="./notaspendientes/{{id}}">Ver</a></td>


            </tr>
            {{/ notasPendientesAprobacion}}
            </tbody>
        </table>
    </div>
</div>
{{> footer}}
