{{> headeradministrador}}

<div class="row justify-content-around">
    {{> sideBarAdministrador}}
    <section id="blog" class="blog col-md-9">
        <section class="column container-fluid">
            <div class="section-title">
                <h2>Notas en publicaciones</h2>
                <p>pendientes de aprobacion</p>
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
                <td><a href="./notaspendientes/{{id}}">Ver</a></td>
                <td>
                    <form action="/aprobaciones/aprobarNotaEnPublicacion" method="POST">
                        <input type="hidden" name="nota_id" value="{{nota_id}}">
                        <input type="hidden" name="publicacion_id" value="{{publicacion_id}}">

                        <button type="submit" class="btn btn-primary btn-sm">Aprobar</button>
                    </form>
                </td>



            </tr>
            {{/ notasEnPublicacionPendientesAprobacion}}
            </tbody>
        </table>
        </section>
    </section>
</div>
{{> footer}}
