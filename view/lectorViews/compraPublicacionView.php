{{> headerLector}}
{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Pricing Section ======= -->
    {{#publicacion}}
    <section id="pricing" class="pricing col-md-9"
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-title">
            <h2>Comprar publicación</h2>
        </div
        <div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-delay="100">
            <form action="/compras/confirmarCompraPublicacion/" method="POST">
                <div class="box">
                    <span class="advanced">{{fecha_publicacion}}</span>
                    <h3>{{nombre}}</h3>
                    <div class="d-flex justify-content-around">
                        <div>
                            <h4><sup>$</sup>{{precio}}<span> / compra</span></h4>
                            <h5>Fecha de publicación: {{fecha_publicacion}}</h5>
                        </div>
                        <div class="text-left">
                            <h5>Forma de pago: </h5>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="tipoPago" class="custom-control-input"
                                       value="1" checked="checked">
                                <label class="custom-control-label" for="customRadio1">Tarjeta de Débido</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="tipoPago" class="custom-control-input"
                                       value="2">
                                <label class="custom-control-label" for="customRadio2">Tarjeta de Crédito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="tipoPago" class="custom-control-input"
                                       value="3">
                                <label class="custom-control-label" for="customRadio3">Mercado Pago</label>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        <input type="hidden" name="id" value="{{id}}">
                        <input type="submit" class="btn btn-success btn-block mr-5"
                               value="Confirmar compra de la publicación">
                    </div>
            </form>
        </div>
    </div>
    </section><!-- End Pricing Section -->
</div>

{{/publicacion}}

{{> footer}}