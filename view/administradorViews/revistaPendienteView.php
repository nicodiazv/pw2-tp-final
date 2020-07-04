{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div class="col-md-8 my-4">

            {{#revistaPendiente}}
            <div class="row">
                <h1 class="display-4">Revista {{nombre_revista}}</h1>
            </div>
        
        <div class="row">
            <div class="col-12">
                <img src="/images/revistas/{{imagen_nombre}}" class="rounded mx-auto d-block" style="height: 200px"  alt="">
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-primary font-weight-bold h5">{{nombre_revista}}</div>
            <div class="col-12 h4">Precio mensual de revista: <span class="text-success font-weight-bold">${{precio_suscripcion_mensual}}</span></div>
            <div class="col-12 text-secondary font-weight-light">{{apellido}}, {{nombre_usuario}}</div>
            <div class="col-12 text-secondary font-weight-light">{{email}}</div>

        </div>


            <div class="row mt-4">
                <div class="col">
                    {{descripcion}}

                </div>
            </div>
            <div class="row justify-content-end my-4 mr-4">
                <form action="/aprobaciones/rechazarRevista" method="POST">
                    <input type="hidden" name="id" value="{{id_revista}}">
                    <button class="btn btn-danger mx-1">Rechazar</button>
                </form>
                <form action="/aprobaciones/aprobarRevista" method="POST">
                    <input type="hidden" name="id" value="{{id_revista}}">
                    <button class="btn btn-success mx-1">Aprobar</button>
                </form>



            </div>
            {{/revistaPendiente}}


    </div>
</div>
{{> footer}}
