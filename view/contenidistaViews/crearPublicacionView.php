{{> headerContenidista}}
{{#flashMessage}}
<div class="alert alert-{{class}}" role="alert">
    {{message}}
</div>
{{/flashMessage}}
<div class="row col-12 justify-content-between" style="min-height: 550px;">

    {{> sideBarContenidista}}


    <!-- ======= Crear nota Section ======= -->
    <section id="" class="contact col-md-9">
        <div class="container-fluid" data-aos="fade-up">
            <div class="col-lg-12 data-aos=" fade-left" data-aos-delay="100">
            <div class="section-title">
                <h2>Crear una publicación</h2>
            </div>
            <!-- formulario para crear una nota -->
            <form action="/publicaciones/guardarPublicacion" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título"
                               required >
                    </div>

                    <div class="col-md-6 form-group">
                        <select class="form-control btn-border border" name="revista" >
                            <option value="" selected>Seleccione una revista</option>
                            {{#revistas}}
                            <option value="{{id}}">{{nombre}}</option>
                            {{/revistas}}

                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                            <input type="number" name="precio" class="form-control"
                                   aria-label="Amount (to the nearest dollar)" data-bind="value:replyNumber"
                                   placeholder="Precio final" required>
                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                        </div>
                    </div>

                    <div class="text-center col-md-12">
                        <button type="submit" class="btn-block btn btn-outline-primary">Crear publicación</button>
                    </div>
            </form>
            <!-- END formulario para crear una nota -->
        </div>
</div>
</section>
<!-- ======= END Crear nota Section ======= -->
</div>

<script src="/view/js/ubicacion.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk95kpZ90NBtlkoHX3MrerMAzHVokLInc&libraries=places&callback=buscarLugar"></script>


{{> footer}}