{{> header}}
{{#flashMessage}}
<div class="alert alert-{{class}}" role="alert">
    {{message}}
</div>
{{/flashMessage}}
    <div class="row justify-content-around">

        {{> sideBarContenidista}}


      <!-- ======= Crear nota Section ======= -->
      <section id="" class="contact col-md-9">
        <div class="container-fluid" data-aos="fade-up">
          <div class="col-lg-12 data-aos=" fade-left" data-aos-delay="100">
            <div class="section-title">
              <h2>Agregar una nota</h2>
            </div>
            <!-- formulario para crear una nota -->
            <form action="/nota/guardarNota" method="POST" role="form" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título de la nota"
                    required />
                </div>

                <div class="col-md-6 form-group">
                  <select class="form-control btn-border border" name="seccion" >
                    <option value="" selected>Seleccione una seccion</option>
                      {{#secciones}}
                        <option value="{{id}}">{{nombre}}</option>
                      {{/secciones}}

                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" name="ubicacion" class="form-control" id="ubicacion" placeholder="Ubicación de la nota"
                    required />
                </div>
                <div class="col-md-6 form-group ">
                  <input type="file" class="custom-file-input" id="uploadedImage" name="uploadedImage"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Seleccionar imagen para la nota</label>
                </div>
                <div class="form-group col-md-12">
                  <textarea class="form-control" name="cuerpo" rows="5" placeholder="Escriba el cuerpo de la nota"
                    ></textarea>
                </div>
                <label for="basic-url">Link para más información</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://</span>
                  </div>
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" >
                </div>
                <div class="text-center col-md-12">
                  <button type="submit" class="btn-block">Crear nota</button>
                </div>
            </form>
            <!-- END formulario para crear una nota -->
          </div>
        </div>
      </section>
      <!-- ======= END Crear nota Section ======= -->
    </div>

{{> footer}}