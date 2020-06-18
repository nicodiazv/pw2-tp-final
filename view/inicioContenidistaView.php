{{> header}}
{{#flashMessage}}
<div class="alert alert-{{class}}" role="alert">
    {{message}}
</div>
{{/flashMessage}}
    <div class="row justify-content-around">
        {{> sideBarContenidista}}

      <!-- ======= Administracion Section ======= -->
      <section id="services" class="services col-md-9">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Administración de contenidos</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
              consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
              sit in iste officiis commodi quidem hic quas.</p>
          </div>
          <div class="row">
            <!-- Tarjeta de administración -->
            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <i class="icofont-computer"></i>
                <h4><a href="/revistas/crearRevista">Crear diario o revista nueva</a></h4>
                <p>En esta sección usted podrá crear sus diarios o revistas. El estado de estos pasará a pendientes de
                  aprobación.</p>
              </div>
            </div>
            <!-- End Tarjeta de administración -->
            <!-- Tarjeta de administración -->
            <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <i class="icofont-chart-bar-graph"></i>
                <h4><a href="#">Crear nota dentro de un diario o revista existente</a></h4>
                <p>En esta sección usted podrá crear notas para diarios o revistas. El estado de estas pasará a
                  pendientes de aprobación.</p>
              </div>
            </div>
            <!-- End Tarjeta de administración -->
              <!-- Tarjeta de administración -->
              <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                      <i class="icofont-chart-bar-graph"></i>
                      <h4><a href="nota/crearnota">Crear nota</a></h4>
                      <p>En esta sección usted podrá crear notas. El estado de estas pasará a
                          pendientes de aprobación.</p>
                  </div>
              </div>
              <!-- End Tarjeta de administración -->
          </div>
        </div>



      </section>
      <!-- ======= End Administracion Section ======= -->
    </div>



{{> footer}}