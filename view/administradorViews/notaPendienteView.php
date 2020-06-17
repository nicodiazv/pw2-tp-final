{{> headeradministrador}}

<div class="row justify-content-around">
    {{> sideBarAdministrador}}
    <div class="col-md-8">

            {{# nota}}
            <div class="row">
                <h1 class="display-4">{{titulo}}</h1>
            </div>
            <div class="row">
                <small>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto autem beatae, eligendi eveniet hic illo in laborum maiores molestias, nisi nobis omnis perspiciatis placeat quaerat quam recusandae unde velit, voluptates!
                </small>
            </div>
            <div class="row">
                {{cuerpo}}
            </div>


            <div class="row justify-content-end">
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
