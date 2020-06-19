{{> headerLector}}
<div class="row justify-content-around">
    {{> sideBarLector}}
    <!-- ======= Pricing Section ======= -->
    {{#revista}}
    <section id="pricing" class="pricing"
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2 class="text-danger">Desuscribirse a la revista {{nombre}} </h2>
            <p>En esta sección podrás confirmar la desuscripción a la revista.</p>
        </div
        <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
                <span class="advanced bg-danger">MENSUAL</span>
                <h3 class="text-danger">{{nombre}}</h3>
                <img src="/images/revistas/{{imagen_nombre}}" class="img-fluid rounded img-thumbnail w-25 mx-auto d-block"
                     alt="">
                <h4 class="text-danger" ><sup>$</sup>{{precio_suscripcion_mensual}}<span> / mes</span></h4>
                <ul>
                    <li>Descripción del diario Descripción del diario Descripción del diario Descripción del diario
                        Descripción del diario Descripción del diario Descripción del diario Descripción del diario
                        .
                    </li>
                </ul>
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