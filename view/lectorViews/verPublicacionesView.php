{{> headerLector}}

<div class="row justify-content-between">
    {{> sideBarLector}}
    <div class="col-md-8 my-4">

        <h1 class="section-title">Publicaciones Disponibles</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Titulo de la publicación</th>
                <th>Revista</th>
                <th>Fecha de publicación</th>
                <th></th>
            </tr>
            <tbody>
            {{# publicaciones}}
            <tr>
                <td>{{publicacion_nombre}}</td>
                <td>{{revista_nombre}}</td>
                <td>{{fecha_publicacion}}</td>
                <td><a href="/publicaciones/publicacion/{{id_publicacion}}">Ver notas de la publicación</a></td>
            </tr>
            {{/ publicaciones}}
            </tbody>
        </table>
    </div>
</div>
{{> footer}}
