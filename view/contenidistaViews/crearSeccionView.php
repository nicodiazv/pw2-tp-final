{{> headerContenidista}}
<div class="row col-12 justify-content-between">
    {{> sideBarContenidista}}

    {{#flashMessage}}
    <div class="alert alert-{{class}}" role="alert">
        {{message}}
    </div>
    {{/flashMessage}}

    <!-- ======= Crear seccion ======= -->
    <section id="services" class="services col-md-9">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Crear Sección</h2>
            </div>

            <!-- formulario para crear una sección -->
            <form action="/seccion/guardarSeccion" method="POST" role="form" enctype="multipart/form-data">
                <div class="col-md-12 form-group">
                    <input type="text" name="nombre" class="form-control" id="nombre_seccion" placeholder="Ingrese el nombre de la sección"
                           required />
                </div>
                <div class="text-center col-md-12">
                    <button type="submit" class="btn-block btn btn-outline-primary">Crear sección</button>
                </div>
            </form>

        </div>

    </section>
    <!-- ======= End crear sección ======= -->
</div>

{{> footer}}