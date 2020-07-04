{{> headeradministrador}}
<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div class="col-md-8">

        <section id="" class="contact col-md-9">
            <div class="container-fluid" data-aos="fade-up">
                <div class="col-lg-12 data-aos=" fade-left" data-aos-delay="100">
                <div class="section-title">
                    <h2>Editar usuario</h2>
                    {{#alert}}
                    <div class="alert alert-{{class}}" role="alert">
                        {{message}}
                    </div>
                    {{/alert}}
                </div>
                <!-- formulario para editar un usuario -->
                {{#usuario}}
                <form action="/usuarios/editarUsuario" method="POST" role="form" enctype="multipart/form-data"   >
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{id}}" class="form-control" id="id"
                                />
                        <div class="col-md-6 form-group">
                            <input type="text" name="nombre" value="{{nombre}}" class="form-control" id="nombre" placeholder="Nombre" {{disabled}}
                                   required />
                        </div>

                        <div class="col-md-6 form-group">
                            <input type="text" name="apellido" value="{{apellido}}" class="form-control" id="apellido" placeholder="Apellido"
                                   required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" name="email"  value="{{email}}" class="form-control" id="email" placeholder="Email"
                                   required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="password" name="password" value="{{password}}" class="form-control" id="password" placeholder="Contraseña"
                                   required />
                        </div>
                        <div class="col-md-6 form-group ">
                            <select required class="form-control btn-border border" name="rol"  >
                                <option {{administrador}} value="1">Administrador</option>
                                <option {{contenidista}} value="2">Contenidista</option>
                                <option {{lector}} value="3">Lector</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group"></div>
                        <div class="col-md-6 form-group">
                            <input type="text" name="direccion" value="{{direccion}}" class="form-control" id="direccion" placeholder="Dirección"
                                   required />
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="tel" name="telefono" value="{{telefono}}" class="form-control" id="telefono" placeholder="Teléfono"
                                   required />
                        </div>

                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-block btn-primary" {{disabled}}>Editar</button>
                        </div>
                </form>
                {{/usuario}}
                <!-- END formulario para editar un usuario -->
            </div>
    </div>
    </section>

    </div>
</div>
{{> footer}}
