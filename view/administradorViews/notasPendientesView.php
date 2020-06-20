{{> headeradministrador}}

<div class="row justify-content-around">
    {{> sideBarAdministrador}}
    <div id="blog" class="blog col-md-9">

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
    </div>
</div>
{{> footer}}
