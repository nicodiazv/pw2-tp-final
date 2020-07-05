{{> headerLector}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <div class="col-md-9 my-4">
        <div class="row">
            <div class="col-sm-12">
                {{#nombre_revista}}
                <div class="section-title">
                    <h2>Publicaciones de la revista {{nombre_revista}} </h2>
                    <p>Aquí podrás encontrar todas las publicaciones disponibles de la revista {{nombre_revista}} para
                        usted</p>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Titulo de la publicación</th>
                    <th>Fecha de publicación</th>
                    <th></th>
                </tr>
                <tbody>
                {{#publicacionesDeRevista}}
                <tr>
                    <td><a href="/publicaciones/publicacion/{{id_publicacion}}">{{nombre_publicacion}}</a></td>
                    <td>{{fecha_publicacion}}</td>
                    <td><a href="/publicaciones/publicacion/{{id_publicacion}}">Ver notas de esta publicación</a></td>
                </tr>
                {{/publicacionesDeRevista}}
                </tbody>
            </table>
            <a href="/revistas/misRevistas" class="h5">Volver</a>
            {{/nombre_revista}}
        </div>
    </div>
    {{> footer}}
