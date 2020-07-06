{{> headeradministrador}}
{{#alert}}
<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBaradministrador}}
    <!-- ======= Compras ======= -->
    <section id="blog" class="blog col-md-10">
        <div class="column">
            <div class="section-title">
                <h2>Administración de Votos</h2>
                <p>Aquí podrá ver las valoraciones recibidas en las notas.</p>
            </div>
            <!-- ======= Publicaciones Adquiridas por suscripcion ======= -->
            <div class="row">
                <div class="col-md-12 d-flex nowrap">
                    <div class="col-md-4">
                        <h3 class="text-success font-weight-bold text-center">Votos positivos</h3>
                        <div class="">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Título de la nota</th>
                                    <th class="text-center"><i class="icofont-laughing icofont-2x"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                {{#votos_positivos}}
                                <tr>
                                    <td>{{titulo_nota}}</td>
                                    <td class="h3 text-center">{{cantidad}}</td>
                                </tr>
                                {{/votos_positivos}}
                                </tbody>
                            </table>
                            {{^votos_positivos}}<h5 class="text-danger ml-5">Todavía no hay votos positivos.</h5>
                            {{/votos_positivos}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="text-primary font-weight-bold text-center">Votos regulares</h3>
                        <div class="">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Título de la nota</th>
                                    <th class="text-center"><i class="icofont-slightly-smile icofont-2x"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                {{#votos_regulares}}
                                <tr>
                                    <td>{{titulo_nota}}</td>
                                    <td class="h3 text-center">{{cantidad}}</td>
                                </tr>
                                {{/votos_regulares}}
                                </tbody>
                            </table>
                            {{^votos_regulares}}<h5 class="text-primary ml-5">Todavía no hay votos regulares.</h5>
                            {{/votos_regulares}}
                        </div>


                    </div>
                    <div class="col-md-4">
                        <h3 class="text-danger font-weight-bold text-center">Votos negativos</h3>
                        <div class="">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Título de la nota</th>
                                    <th class="text-center"><i class="icofont-confused icofont-2x"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                {{#votos_negativos}}
                                <tr>
                                    <td>{{titulo_nota}}</td>
                                    <td class="h3 text-center">{{cantidad}}</td>
                                </tr>
                                {{/votos_negativos}}
                                </tbody>
                            </table>
                            {{^votos_negativos}}
                            <h5 class="text-success ml-5">Todavía no hay votos negativos.</h5>
                            {{/votos_negativos}}
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- End Catalogo de diarios -->
</div>
{{> footer}}
