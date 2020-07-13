{{> header}}
{{#flashMessage}}
<div class="alert alert-{{class}}" role="alert">
    {{message}}
</div>
{{/flashMessage}}
<!-- ======= Slider Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animated fadeInDown mt-1">Noticia del día</h2>
                <p class="animated fadeInUp">Infonete te regala una noticia de portada gratuita para que puedas
                    mantenerte informado con todos las noticias de último momento.</p>
                <a href="https://es.wikipedia.org/wiki/Ricardo_Fort" class="btn-get-started animated fadeInUp scrollto">Leer
                    la noticia
                    del día</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animated fadeInDown">Mantente informado</h2>
                <p class="animated fadeInUp">Mantenete informado suscribiendote a los diarios y noticias de todo
                    el
                    mundo.</p>
                <a href="#login" class="btn-get-started animated fadeInUp scrollto">Mantente informado</a>
            </div>
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</section>
<!-- End Slider -->

<!-- ======= Seccion login ======= -->
<section id="login" class="contact mt-5">

    <div class="" data-aos="fade-up">

        {{#alert}}
        <div class="alert alert-{{class}}" role="alert">
            {{message}}
        </div>
        {{/alert}}

        <!-- Seccion Formularios -->
        <div class="row mt-1 d-flex justify-content-center">
            <!-- Formulario de Iniciar Sesión -->
            <div class="col-lg-6" data-aos="fade-right" id="pnlSesion" data-aos-delay="100">
                <div class="col-lg-8 mx-auto">
                    <form action="/login/validarLogin" method="POST" class="php-email-form">
                        <div class="col-md-12 form-group">
                            <p class="h2 font-weight-bold">Iniciar Sesión</p>
                            <input type="text" name="email" class="form-control"
                                   placeholder="Ingrese su e-mail" required/>
                            <input type="password" class="form-control mt-2" name="password"
                                   placeholder="Ingrese su contraseña" required/>
                            <br>
                            <!-- <div class="or-seperator"><i>or</i></div>
                             <a href="#" class="btn btn-danger btn-block mb-3"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>-->
                            <div class="hint-text small">No tienes cuenta? <a style="cursor:pointer;"
                                                                              class="text-success"
                                                                              onclick="Registrarse();">Registrate
                                    ahora!</a></div>
                            <input type="hidden" name="latitud" id="lat" value="">
                            <input type="hidden" name="longitud" id="long" value="">
                        </div>
                        <div class="text-center">
                            <button type="submit">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Formulario de Iniciar Sesion -->

            <!-- Formulario de Registro -->
            <div class="col-lg-6" style="" data-aos="fade-right" id="pnlRegistro" data-aos-delay="100">
                <div class="col-lg-8 mx-auto">

                    <form action="/registro/registrar" method="POST" class="php-email-form">
                        <p class="h2 font-weight-bold">Registrarse</p>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="nombre" class="form-control"
                                       placeholder="Ingrese su nombre" required/>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="apellido"
                                       placeholder="Ingrese su apellido" required/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="direccion" id="ubicacion"
                                       placeholder="Ingrese su dirección" required/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" class="form-control" name="telefono" id="replyNumber"
                                       placeholder="Ingrese su teléfono. ej: 46524343" min="0"
                                       data-bind="value:replyNumber" step="1" required
                                       style="-moz-appearance: textfield;"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="email"
                                       placeholder="Ingrese su email" required/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" name="password"
                                       placeholder="Ingrese su contraseña" required/>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Registrarse</button>
                            <div class="hint-text small">Ya tienes cuenta? <a style="cursor:pointer;"
                                                                              class="text-success"
                                                                              onclick="volver();">Iniciá sesión
                                    ahora!</a></div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- END Formulario de Registro -->
            <img src="/view/img/rickyhome1.png" id="rickiSelañando" alt=""
                 style="display: none; height: 500px; width: 600px">
        </div>

        <!-- END Seccion Formularios -->
    </div>
</section>
<!-- End Contact Section -->


<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk95kpZ90NBtlkoHX3MrerMAzHVokLInc&libraries=places&callback=buscarLugar"></script>
        ======= Clima de google =======
        <section id="cta" class="cta">
            <div class="container">
                <div class="row">
                    <h1>Clima de Google</h1>
                </div>
            </div>
        </section>-->
<a class="weatherwidget-io" href="https://forecast7.com/es/n34d60n58d38/buenos-aires/" data-label_1="BUENOS AIRES"
   data-label_2="CLIMA" data-theme="original">BUENOS AIRES CLIMA</a>

<a class="weatherwidget-io" href="https://forecast7.com/en/25d79n80d13/miami-beach/" data-label_1="MIAMI BEACH"
   data-label_2="WEATHER" data-theme="hexellence">MIAMI BEACH WEATHER</a>
{{> footer}}
