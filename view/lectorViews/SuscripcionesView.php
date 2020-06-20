{{> headerLector}}

<div class="row justify-content-around">
    {{> sideBarLector}}
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Mis suscripciones</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            {{#misSuscripciones}}
            <!-- Tarjeta individual -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="box">
                    <h3>{{nombre_revista}}</h3>
                    <span class="advanced bg-success">ADQUIRIDA</span>
                    <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-50">
                    <ul class="mt-3">
                        <li><strong>Fecha Inicio:</strong> {{fecha_inicio}}</li>
                        <li><strong>Fecha Fin:</strong> {{fecha_fin}}</li>
                    </ul>
                    <div class="btn-wrap">
                            <a href="/suscripciones/desuscripcionRevista/{{revista_id}}" class="btn btn-danger">Desuscribirse</a>
                    </div>
                </div>
            </div>
            <!-- Tarjeta individual End -->
            {{/misSuscripciones}}
        </div>


        <div class="container row mt-4 justify-content-center">
            <label class="h3">Desde <input id="date" type="date" class="col-md-12 form-control"></label>
            <label class="h3 ml-4">Hasta <input id="date" type="date"
                                                class="col-md-12 form-control"></label>
            <button type="button"
                    class="col-md-5 btn btn-outline-primary btn-lg btn-block ml-5 font-weight-bold">Imprimir PDF
                con mis pagos y suscripciones</button>
        </div>
    </div>

    <div class="container mt-5" data-aos="fade-up">
        <div class="section-title">
            <h2>Suscribirme a nuevos diarios o revistas</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            {{#revistasNoSuscripto}}
            <div class="col-lg-3 col-md-6 mt-4" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex justify-content-around">
                <div class="box ">
                    <span class="advanced">MENSUAL</span>
                    <h3>{{nombre}}</h3>
    <img src="/images/revistas/{{imagen_nombre}}" alt="" class="img-fluid w-50">

                    <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                    <ul>
                        <li>Agregamos un campo de descripción para las revistas?</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="/suscripciones/suscripcionRevista/{{id}}" class="btn btn-success">Suscribirse</a>
                    </div>
                </div>
            </div>
            </div>
            {{/revistasNoSuscripto}}

        </div>
    </div>

</section><!-- End Pricing Section -->


    {{> footer}}