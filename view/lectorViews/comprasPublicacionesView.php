{{> headerLector}}
{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Compras ======= -->
    <section id="blog" class="blog col-md-9">
        <div class="column container-fluid">
            <div class="section-title">
                <h2>Mis compras de Publicaciones</h2>
                <p>Aquí podrá ver sus publicaciones adquiridas por estar suscrito a revistas y publicaciones compradas individualmente</p>
            </div>
            <!-- ======= Publicaciones Adquiridas por suscripcion ======= -->
            <div class="row">
                <h3>Publicaciones adquiridas por suscripción</h3>
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Revista</th>
                            <th>Precio</th>
                            <th>Fecha de publicación</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{#publicacionesAdquiridas}}
                        <tr>
                            <td><a href="/publicaciones/publicacion/{{id_publicacion}}">{{nombre_publicacion}}</a></td>
                            <td>{{nombre_revista}}</td>
                            <td>€ {{precio_publicacion}}</td>
                            <td>{{fecha_publicacion}}</td>
                            <td><span class="bg-warning text-white p-1 rounded">Adquirida por suscripción <i class="icofont-verification-check"></i></span></td>
                        </tr>
                        {{/publicacionesAdquiridas}}
                        </tbody>
                    </table>
                </div>
            </div>
            {{^publicacionesAdquiridas}}
            <h5 class="text-danger ml-5" >No tienes ninguna publicación adquirida</h5>
            {{/publicacionesAdquiridas}}
            <!-- ======= FIN Publicaciones Adquiridas por suscripcion ======= -->

            <!-- ======= Publicaciones Compradas ======= -->
            <div class="row">
                <h3>Publicaciones compradas</h3>
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Revista</th>
                            <th>Precio</th>
                            <th>Fecha de publicación</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{#publicacionesCompradas}}
                        <tr>
                            <td><a href="/publicaciones/publicacion/{{id_publicacion}}">{{nombre_publicacion}}</a></td>
                            <td>{{nombre_revista}}</td>
                            <td>€ {{precio_publicacion}}</td>
                            <td>{{fecha_publicacion}}</td>
                            <td><span class="bg-warning text-white p-1 rounded">Comprada <i class="icofont-verification-check"></i></span></td>
                        </tr>
                        {{/publicacionesCompradas}}
                        </tbody>
                    </table>
                </div>
            </div>
            {{^publicacionesCompradas}}
            <h5 class="text-danger ml-5" >No tienes ninguna publicación comprada</h5>
            {{/publicacionesCompradas}}
            <!-- ======= FIN Publicaciones Compradas ======= -->

            <!-- ======= Publicaciones NO Compradas ======= -->
            <div class="row">
                <h3>Comprar nuevas publicaciones</h3>
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Revista</th>
                            <th>Precio</th>
                            <th>Fecha de publicación</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{#publicacionesNoCompradas}}
                        <tr>
                            <td>{{nombre_publicacion}}</td>c
                            <td>{{nombre_revista}}</td>
                            <td>€ {{precio_publicacion}}</td>
                            <td>{{fecha_publicacion}}</td>
                            <td><a href="/compras/publicacion/{{id_publicacion}}" class="bg-success text-white p-2 rounded">Comprar <i class="icofont-euro"></i></a></td>
                        </tr>
                        {{/publicacionesNoCompradas}}
                        </tbody>
                    </table>
                </div>
            </div>
            {{^publicacionesNoCompradas}}
            <h5 class="text-danger ml-5" >No hay más publicaciones disponibles</h5>
            {{/publicacionesNoCompradas}}
            <!-- ======= FIN Publicaciones NO Compradas ======= -->
        </div>

    </section>
    <!-- End Catalogo de diarios -->
</div>
{{> footer}}
