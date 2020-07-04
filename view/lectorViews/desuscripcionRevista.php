{{> headerLector}}
{{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
    <!-- ======= Pricing Section ======= -->
    {{#revista}}
    <section id="pricing" class="pricing col-md-9 my-n4""
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2 class="text-danger">Desuscribirse a la revista {{nombre}} </h2>
            <p>En esta sección podrás confirmar la desuscripción a la revista.</p>
        </div
        <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
                <span class="advanced bg-danger">MENSUAL</span>
                <h3 class="text-danger">{{nombre}}</h3>
                <div class="d-flex">
                    <div>
                        <img src="/images/revistas/{{imagen_nombre}}"
                             class="img-fluid rounded img-thumbnail w-75 mx-auto d-block"
                             alt="">

                    </div>
                    <div class="text-left">
                        <h4 class="text-danger"><span>Usted había abonado </span><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                           <p>{{descripcion}}</p>

                    </div>


                </div>


                <form action="/suscripciones/desuscribir" method="post">
                    <div class="btn-wrap">
                        <input type="hidden" name="id" value="{{id}}">
                        <input type="submit" class="btn btn-danger btn-block mr-5" value="Confirmar desuscripción">
                    </div>
                </form>
            </div>
        </div>
        </section><!-- End Pricing Section -->
    </div>

    {{/revista}}

    {{> footer}}