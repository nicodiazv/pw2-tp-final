{{> headerLector}}
{{#alert}}
<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Pricing Section ======= -->
    {{#revista}}
    <section id="pricing" class="pricing col-md-9"
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-title my-n4">
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
                                 class="img-fluid rounded img-thumbnail w-50 mx-auto d-block"
                                 alt="">
                            <h4><sup>€</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                            <ul>
                                <li>{{descripcion}}</li>
                            </ul>
                        </div>

                        <div class="text-left">
                            <h5>Forma de pago: </h5>
                            <div class="form-check">
                                <input type="radio" name="tipoPago" id="debito" value="1" onclick="habilitar(this)">
                                <label for="debito">Tarjeta de Débito</label>
                                <input type="text" name="debito" placeholder="Tarjeta de débito" disabled="true"
                                       class="form-control">
                            </div>
                            <div class="form-check">
                                <input type="radio" name="tipoPago" id="credito" value="2" onclick="habilitar(this)">
                                <label for="credito">Tarjeta de Crédito</label>
                                <input type="text" name="credito" placeholder="Tarjeta de crédito" disabled="true"
                                       class="form-control">
                            </div>
                            <div class="form-check">
                                <input type="radio" name="tipoPago" id="mp" value="3" onclick="habilitar(this)">
                                <label for="mp">Mercado Pago</label>
                                <input type="text" name="mp" placeholder="Usuario de Mercado Pago" disabled="true"
                                       class="form-control">
                            </div>
                        </div>

                        <div>
                            <h2>Fecha de suscripción:</h2>
                            <h2><span class="text-success font-weight-bold">{{fecha_inicio}}</span></h2>
                        </div>
                    </div>
                    <p class="text-danger font-weight-bold h4">Permanecerá suscrito hasta {{fecha_fin}}</p>
                    <div class="btn-wrap">
                        <input type="hidden" name="id" value="{{id}}">
                        <input type="submit" class="btn btn-success btn-block mr-5" value="Confirmar suscripción">
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

{{/revista}}

{{> footer}}
<script src="/view/js/suscripcion.js"></script>