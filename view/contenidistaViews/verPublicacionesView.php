{{> headerContenidista}}

<div class="row justify-content-around">
    {{> sideBarContenidista}}
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Publicaciones</h2>
                        <p>Publicaciones creadas por mi.</p>
                    </div>
                    <div class="row justify-content-start mb-2">
                        <div class="col-3 mb-3 ml-3">
                            <a class="btn btn-primary btn-block" href="/nota/crearNota">Crear publicación</a>
                        </div>
                    </div>

                        <div class="card-deck">
                        {{#publicaciones}}

                        <div class="col-4 mb-4"  >
                            <div class="card"  >
                                {{#aprobada}}
                                    <span style="margin: 10px;position: absolute;top: 0;" class="bg-success text-white p-1 rounded">Aprobada</span> 
                                {{/aprobada}}
                                {{^aprobada}}
                                    <span  style="margin: 10px;position: absolute;top: 0;" class="bg-info text-white p-1 rounded">Pendiente</span> 
                                {{/aprobada}}
                                <img class="card-img-top" src="/images/icon.png" alt="Card image cap" />
                                <div class="card-body pb-1">
                                    <h5 class="card-title"><strong>{{nombre}}</strong></h5>
                                    <p class="card-text ">{{descripcion}}</p>
                                    <h4 class>$ {{precio_suscripcion_mensual}}</h4>   
                                    {{^aprobada}}
                                      <a class="btn btn-primary mb-2" href="/publicacion/editar/{{id}}">Editar</a>
                                    {{/aprobada}}
                                    <a style="float: right;" href="/publicacion/eliminar/{{id}}" class="btn btn-danger mb-2">Eliminar</a>
                                </div>
                            </div>
                            </div>
                        {{/publicaciones}}
                        </div>
                        </div>

                </div>
            </section>
</div>
{{> footer}}
