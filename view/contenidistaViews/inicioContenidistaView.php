{{> headerContenidista}}
<div class="row col-12 justify-content-between">
    {{> sideBarContenidista}}

    <!-- ======= Administracion Section ======= -->
    <section id="services" class="services col-md-9">
        <div class="container" data-aos="fade-up">
            <div class="col-lg-12 data-aos=" fade-left data-aos-delay="100">
                {{#alert}}
                <div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>
                {{/alert}}
                <div class="section-title">
          <div class="section-title">
            <h2>Generación de contenido</h2>
            <p>Aquí podrás gestionar toda tu administración de contenidos.</p>
          </div>
          <div class="row">
              <!-- Tarjeta de administración -->
              <div class="tarjeta col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                      <i class="icofont-newspaper"></i>
                      <h4><a href="/seccion/crearSeccion">Crear sección</a></h4>
                      <p>En este apartado usted podrá crear secciones, las cuales le permitirán agrupar notas dentro
                          de las publicaciones. Una vez creadas las secciones, el estado de estas pasará a
                          pendientes de aprobación.</p>
                  </div>
              </div>
              <!-- End Tarjeta de administración -->
            <!-- Tarjeta de administración -->
            <div class="tarjeta col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <i class="icofont-computer"></i>
                <h4><a href="/revistas/crearRevista">Crear revista</a></h4>
                <p>En esta sección usted podrá crear revistas. El estado de estos pasará a pendientes de
                  aprobación.</p>
              </div>
            </div>

              <!-- Tarjeta de administración -->
              <div class="tarjeta col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                      <i class="icofont-chart-bar-graph"></i>
                      <h4><a href="/nota/crearnota">Crear nota</a></h4>
                      <p>En esta sección usted podrá crear notas. El estado de estas pasará a
                          pendientes de aprobación.</p>
                  </div>
              </div>
              <!-- End Tarjeta de administración -->
              <!-- Tarjeta de administración -->
              <div class="tarjeta col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                      <i class="icofont-file-document"></i>
                      <h4><a href="/publicaciones/crearPublicacion">Crear publicación</a></h4>
                      <p>Aquí podrá generar nuevas entregas asociadas a una revista determinada.</p>
                  </div>
              </div>
              <!-- End Tarjeta de administración -->
          </div>
        </div>


    </section>
    <!-- ======= End Administracion Section ======= -->
</div>


{{> footer}}