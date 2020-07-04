{{> headerLector}}
{{#alert}}
<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
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
                        <div class="mt-5">
                            <h4><sup>€</sup>{{precio}}<span> / compra</span></h4>
                            <h5>Fecha de publicación: {{fecha_publicacion}}</h5>
                            <br/>
                            <p class="text-danger font-weight-bold h5 mt-5">Su compra no tendrá fecha de caducación</p>
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
<script src="/view/js/suscripcion.js"></script>