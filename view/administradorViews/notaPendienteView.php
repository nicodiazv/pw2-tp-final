{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div class="col-md-8 my-4">

            {{# nota}}
            <div class="row">
                <h1 class="display-4">{{titulo}}</h1>
            </div>
        
        <div class="row">
            <div class="col-12">
                <img src="/images/notas/{{imagen_nombre}}" class="rounded mx-auto d-block" style="height: 200px"  alt="">
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-primary font-weight-bold">{{autor_nombre}} {{auto_apellido}}</div>
            <div class="col-12">¿Fecha de creación de la nota?</div>
            <div class="col-12 text-secondary font-weight-light">{{ubicacion_nombre}}</div>

        </div>

            <div class="row my-2">
                <div class="col">
                    <small>
                        {{copete}}
                    </small>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    {{cuerpo}}
                </div>
            </div>


            <div class="row justify-content-end my-4 mr-4">
                <form action="/aprobaciones/rechazarNota/{{id}}">
                    <button class="btn btn-danger mx-1">Rechazar</button>
                </form>
                <form action="/aprobaciones/aprobarNota/{{id}}">
                    <button class="btn btn-success mx-1">Aprobar</button>
                </form>

            </div>
            {{/ nota}}


    </div>
</div>
{{> footer}}
