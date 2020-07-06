{{> headerContenidista}}

{{#flashMessage}}
<div class="alert alert-{{class}}" role="alert">
    {{message}}
</div>
{{/flashMessage}}
<div class="row col-12 justify-content-between">

    {{> sideBarContenidista}}

    <!-- ======= Crear nota Section ======= -->
    <section id="" class="contact col-md-9">
        <div class="container-fluid" data-aos="fade-up">
            <div class="col-lg-12 data-aos=" fade-left data-aos-delay="100">
                {{#alert}}
                <div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>
                {{/alert}}
            <div class="section-title">
                <h2>Agregar una revista</h2>
            </div>
            <!-- formulario para crear una nota -->
            <form action="/revistas/guardarRevista" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="nombre" class="form-control" id="name"
                               placeholder="Nombre de la revista" required
                        />
                    </div>
                    <div class="col-md-6 form-group ">
                        <input type="file" class="custom-file-input" id="uploadedImage" name="uploadedImage"
                               aria-describedby="inputGroupFileAddon01"required>
                        <label class="custom-file-label" for="inputGroupFile01" id="uploadedImage__label">Seleccionar
                            imagen para la revista</label>
                    </div>
                    <div class="form-group col-md-12">
                        <textarea class="form-control" name="descripcion" rows="5"
                                  placeholder="Escriba la descripción de la revista" required></textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                            <input type="number" name="precioMensual" class="form-control"
                                   aria-label="Amount (to the nearest dollar)" data-bind="value:replyNumber"
                                   placeholder="Precio mensual de la revista" required>
                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                        </div>
                    </div>
                    <div class="text-center col-md-12">
                        <button type="submit" class="btn-block">Confirmar revista</button>
                    </div>
            </form>
            <!-- END formulario para crear una nota -->
        </div>
    </section>

    <script>
        const $file_input = document.getElementById('uploadedImage')
        const $file_label = document.getElementById('uploadedImage__label')
        $file_input.addEventListener('change', (e) => {
            console.log(e.target.files[0].name)
            $file_label.innerHTML = e.target.files[0].name;
        })
    </script>
    <script src="/view/js/ubicacion.js"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk95kpZ90NBtlkoHX3MrerMAzHVokLInc&libraries=places&callback=buscarLugar"></script>


    {{> footer}}