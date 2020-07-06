{{> headerLector}}

<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <div class="col-md-9 my-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2>Publicaciones</h2>
                    <p>Aquí podrás encontrar todas las publicaciones disponibles para usted.</p>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Titulo de la publicación</th>
                    <th>Revista</th>
                    <th>Fecha de publicación</th>
                    <th></th>
                </tr>
                <tbody>
                {{#publicaciones}}
                <tr>
                    <td><a href="/publicaciones/publicacion/{{id_publicacion}}">{{nombre_publicacion}}</a></td>
                    <td>{{nombre_revista}}</td>
                    <td>{{fecha_publicacion}}</td>
                    <td><a class="btn btn-primary" href="/publicaciones/publicacion/{{id_publicacion}}">Ver notas <i
                                    class='icofont-caret-right bx-fade-down'></a></td>
                </tr>
                {{/publicaciones}}
                </tbody>
            </table>
            {{^publicaciones}}
            <h5 class="text-danger ml-5" >No has adquirido ninguna publicación aún.</h5>
            {{/publicaciones}}
        </div>
        <div class="mt-5"><a href="/" class="h5">Volver</a></div>
    </div>
    {{> footer}}
