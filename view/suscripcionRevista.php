{{> headerLector}}
<div class="row justify-content-around">
    {{> sideBarLector}}
    <!-- ======= Pricing Section ======= -->
    {{#revista}}
    <section id="pricing" class="pricing"
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Suscribirse a revista</h2>
            <p>En esta sección podrás suscribirte a la revista.</p>
        </div
        <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
                <span class="advanced">MENSUAL</span>
                <h3>{{nombre}}</h3>
                <img src="img/ricardo_fort1.jpg" class="img-fluid rounded img-thumbnail w-25 mx-auto d-block"
                     alt="">
                <h4><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                <h4><sup>$</sup>XX<span> / edición</span></h4>
                <ul>
                    <li>Descripción del diario Descripción del diario Descripción del diario Descripción del diario
                        Descripción del diario Descripción del diario Descripción del diario Descripción del diario
                        .
                    </li>
                </ul>
                <form action="/suscripciones/suscribir" method="post">
                    <div class="btn-wrap">
                        <input type="hidden" name="idRevista" value="{{id}}">
                        <input type="submit" class="btn btn-success btn-block mr-5" value="Suscribir">
                    </div>
                </form>
            </div>
        </div>
        </section><!-- End Pricing Section -->
    </div>

    {{/revista}}

    {{> footer}}