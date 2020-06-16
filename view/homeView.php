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
                        <a href="noticia-gratis.html" class="btn-get-started animated fadeInUp scrollto">Leer la noticia
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
                {{#alertSesionCerrada}}
                <div class="alert alert-{{class}}" role="alert">
                    {{message}}
                </div>
                {{/alertSesionCerrada}}
                {{#alertRegistroCorrecto}}
                <div class="alert alert-{{class}}" role="alert">
                    {{message}}
                </div>
                {{/alertRegistroCorrecto}}

                <div class="section-title"><a class="h1" href="index.html#login">Inicia Sesión</a></div>



                <!-- Seccion Formularios -->
                <div class="row mt-1 d-flex justify-content-center">

                    <!-- Formulario de Iniciar Sesión -->
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <div class="col-lg-8 mx-auto">
                            <p class="h2 font-weight-bold">Iniciar sesión</p>

                            <form action="/login/validarLogin" method="POST" class="php-email-form">
                                <div class="col-md-12 form-group">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="Ingrese su e-mail" required/>
                                    <input type="password" class="form-control mt-2" name="password"
                                        placeholder="Ingrese su contraseña" required/>
                                        <div class="or-seperator"><i>or</i></div>
                                        <a href="#" class="btn btn-danger btn-block mb-3"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
                                        <div class="hint-text small">No tienes cuenta? <a href="#login" class="text-success">Registrate ahora!</a></div>
                                    <input type="hidden" name="latitud" id="lat" value="">
                                    <input type="hidden" name="longitud" id="long" value="">
                                </div>
                                <div class="text-center"><button type="submit">Iniciar sesión</button></div>
                            </form>
                        </div>
                    </div>
                    <!-- END Formulario de Iniciar Sesion -->
                    
                    <!-- Formulario de Registro -->
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <div class="col-lg-8 mx-auto">
                            <p class="h2 font-weight-bold">Registrarse</p>

                            <form action="/registro/registrar" method="POST" class="php-email-form">
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="nombre" class="form-control"
                                            placeholder="Ingrese su nombre" />
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="apellido"
                                            placeholder="Ingrese su apellido" required/>
                                    </div>
                                    <!-- <div class="col-md-12 form-group">
                                        <input type="date" class="form-control" name="fecha_nac"
                                            placeholder="Ingrese su fecha de nacimiento" required/>
                                    </div> -->
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Ingrese su email"required />
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Ingrese su contraseña" required/>
                                    </div>
                                </div>

                                <div class="text-center"><button type="submit">Registrarse</button></div>
                            </form>
                        </div>
                    </div>
                    <!-- END Formulario de Registro -->

                </div>
                <!-- END Seccion Formularios -->
            </div>
        </section>
        <!-- End Contact Section -->
{{#alert}}
<div class="alert alert-{{class}}" role="alert">
    {{message}}
</div>
{{/alert}}


        <!-- ======= Clima de google ======= -->
        <section id="cta" class="cta">
            <div class="container">
                <div class="row">
                    <h1>Clima de Google</h1>
                </div>
            </div>
        </section><!-- End Clima de Google -->

{{> footer}}
