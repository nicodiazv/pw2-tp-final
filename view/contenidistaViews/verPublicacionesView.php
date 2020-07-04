{{> headerContenidista}}
<div class="row col-12 justify-content-between">
    {{> sideBarContenidista}}

    <div class="col-md-9 my-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-lg-12 data-aos=" fade-left data-aos-delay="100">
                {{#alert}}
                <div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>
                {{/alert}}
                    </div>
                <div class="section-title">
                    <h2>Mis Publicaciones</h2>
                    <p>Aquí podrás encontrar todas las publicaciones creadas por usted.</p>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Revista</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                <tbody>
                {{# publicaciones}}
                <tr>
                    <td>{{nombre}}</td>
                    <td>{{revista}}</td>
                    <td>${{precio}}</td>
                    <td>{{fecha_publicacion}}</td>
                    <td>
                        {{#aprobada}}
                        <span id="estado" class="bg-success text-white p-1 rounded">Aprobada</span>
                        {{/aprobada}}
                        {{^aprobada}}
                        <span class="bg-info text-white p-1 rounded">Pendiente</span>
                        {{/aprobada}}
                    </td>
                    <td><a class="bg-danger text-white p-1 rounded" href="/publicaciones/desactivar/{{id}}">Desactivar <i
                                    class='icofont-caret-right bx-fade-down'></a></td>
                </tr>
                {{/ publicaciones}}
                </tbody>
            </table>
        </div>
    </div>
    {{> footer}}
