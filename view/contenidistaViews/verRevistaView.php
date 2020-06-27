{{> headerContenidista}}

<div class="row justify-content-around">
    {{> sideBarContenidista}}
    <div class="col-md-8 my-4">

            {{#revista}}
            <div class="row">
                <h1 class="display-4">{{nombre}}</h1>
            </div>
        
        <div class="row">
            <div class="col-12">
                <img src="/images/revistas/{{imagen_nombre}}" class="rounded mx-auto d-block mb-3" style="height: 200px"  alt="">
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-primary font-weight-bold h5">{{nombre}}</div>
            <div class="col-12 h4">Precio mensual de revista: <span class="text-success font-weight-bold">${{precio_suscripcion_mensual}}</span></div>
        </div>


            <div class="row mt-4">
                <div class="col">
                    {{descripcion}}

                </div>
            </div>
            <div class="row justify-content-end my-4 mr-4">

            </div>
            {{/revista}}


    </div>
</div>
{{> footer}}
