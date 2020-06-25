{{> headerLector}}

<div class="row justify-content-around">
    {{> sideBarLector}}
    <!-- ======= Administracion Section ======= -->
    <section id="services" class="services col-md-9">
        <div class="container" data-aos="fade-up">
            <div class="col-lg-12 data-aos=" fade-left data-aos-delay="100">
                {{#alert}}
                <div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>
                {{/alert}}
                <div class="section-title">
                    <div class="section-title">
                        <h2>Contenidos</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                            sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="row">
                        <!-- Tarjeta de administración -->
                        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <i class="icofont-computer"></i>
                                <h4><a href="/catalogos">Cátalogos</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque, delectus eligendi excepturi maxime optio.</p>
                            </div>
                        </div>
                        <!-- Tarjeta de administración -->
                        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="icofont-chart-bar-graph"></i>
                                <h4><a href="/revistas/misRevistas">Mis Revistas</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque, delectus eligendi excepturi maxime optio saepe </p>
                            </div>
                        </div>
                        <!-- End Tarjeta de administración -->
                        <!--
                        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                          <div class="icon-box">
                            <i class="icofont-chart-bar-graph"></i>
                            <h4><a href="#">Crear nota dentro de una revista existente</a></h4>
                            <p>En esta sección usted podrá crear notas para diarios o revistas. El estado de estas pasará a
                              pendientes de aprobación.</p>
                          </div>
                        </div>
                        -->
                        <!-- Tarjeta de administración -->
                        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="icofont-chart-bar-graph"></i>
                                <h4><a href="/suscripciones">Mis suscripciones</a></h4>
                                <p>En esta sección usted podrá crear notas. El estado de estas pasará a
                                    pendientes de aprobación.</p>
                            </div>
                        </div>
                        <!-- End Tarjeta de administración -->
                        <!-- Tarjeta de administración -->
                        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="icofont-newspaper"></i>
                                <h4><a href="#">Mis Compras</a></h4>
                                <p>En este apartado usted podrá crear secciones, las cuales le permitirán agrupar notas dentro
                                    de las publicaciones. Una vez creadas las secciones, el estado de estas pasará a
                                    pendientes de aprobación.</p>
                            </div>
                        </div>
                        <!-- End Tarjeta de administración -->
                    </div>
                </div>
</div>
{{> footer}}
