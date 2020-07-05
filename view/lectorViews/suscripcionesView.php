{{> headerLector}}
{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing col-md-9 mt-n4">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-n4">
                <h2>Mis suscripciones</h2>
                <p>Aquí podrás encontrar a que revistas te encuentras suscrito.</p>
            </div>
            <div class="row">
                {{#misSuscripciones}}
                <!-- Tarjeta individual -->
                <div class="col-sm-3 align-self-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3>{{nombre_revista}}</h3>
                        <span class="advanced bg-success">ADQUIRIDA</span>
                        <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid " width="100"
                             height="100">
                        <ul class="mt-2">
                            <li><strong>Precio de revista: </strong>€{{precio_suscripcion_mensual}}</li>
                            <li><strong>Inicio de suscripción:</strong> {{fecha_inicio}}</li>
                            <li><strong>Vencimiento de suscripción:</strong> {{fecha_fin}}</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="/suscripciones/desuscripcionRevista/{{revista_id}}" class="btn btn-danger">Desuscribirse <i class="icofont-close"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Tarjeta individual End -->
                {{/misSuscripciones}}
            </div>
            {{^misSuscripciones}}
            <h5 class="text-danger ml-5">No tienes ninguna suscripción</h5>
            {{/misSuscripciones}}


            <div class="container row mt-4 justify-content-center">
                <label class="h3">Desde <input id="date" type="date" class="col-md-12 form-control"></label>
                <label class="h3 ml-4">Hasta <input id="date" type="date"
                                                    class="col-md-12 form-control"></label>
                <button type="button"
                        class="col-md-5 btn btn-outline-primary btn-lg btn-block ml-5 font-weight-bold">Imprimir PDF
                    con mis pagos y suscripciones
                </button>
            </div>
        </div>

        <div class="container mt-5" data-aos="fade-up">
            <div class="section-title">
                <h2>Suscripción a nuevas revistas</h2>
                <p>Aquí podrás encontrar a que revistas puedes suscribirte.</p>
            </div>

            <div class="row">

                {{#revistasNoSuscripto}}
                <div class="col-lg-3 col-md-6 mt-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex justify-content-around">
                        <div class="box ">
                            <span class="advanced">MENSUAL</span>
                            <h3>{{nombre}}</h3>
                            <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-50">

                            <h4><sup>€</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                            <ul>
                                <li>Agregamos un campo de descripción para las revistas?</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="/suscripciones/suscripcionRevista/{{id}}"
                                   class="btn btn-success">Suscribirse <i class="icofont-dotted-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                {{/revistasNoSuscripto}}

            </div>
        </div>

    </section><!-- End Pricing Section -->


    {{> footer}}