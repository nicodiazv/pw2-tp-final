{{> headerLector}}
{{#alert}}
<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>
{{/alert}}
<div class="row justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Pricing Section ======= -->
    {{#revista}}
    <section id="pricing" class="pricing col-md-9"
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-title">
            <h2>Suscribirse a la revista {{nombre}} </h2>
        </div
        <div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="100">
            <form action="/suscripciones/suscribir" method="post">
                <div class="box">
                    <span class="advanced">MENSUAL</span>
                    <h3>{{nombre}}</h3>
                    <div class="d-flex">
                        <div>

                            <img src="/images/revistas/{{imagen_nombre}}"
                                 class="img-fluid rounded img-thumbnail w-75 mx-auto d-block"
                                 alt="">
                            <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                            <ul>
                                <li>{{descripcion}}
                                </li>
                            </ul>
                        </div>
                        <div class="text-left">
                            <h5>Forma de pago: </h5>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Tarjeta de Débido</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Tarjeta de Crédito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">Mercado Pago</label>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        <input type="hidden" name="id" value="{{id}}">
                        <input type="submit" class="btn btn-success btn-block mr-5" value="Confirmar suscripción">
                    </div>
            </form>
        </div>
    </div>
    </section><!-- End Pricing Section -->
</div>

{{/revista}}

{{> footer}}