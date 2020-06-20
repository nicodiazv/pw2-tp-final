{{> headeradministrador}}

<div class="row justify-content-around">
    {{> sideBarAdministrador}}

    <div id="blog" class="blog col-md-9">

            <div class="section-title">
                <h2>Pendientes</h2>
                <p>pendientes de aprobacion</p>
            </div>

        <div class="card-deck my-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notas <i class=" icofont-notepad icofont-1x"></i></h5>
                    <p class="card-text">Aquí se agrupan las notas creadas por los contenidistas</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#notas}}<a href="/aprobaciones/notaspendientes"> Tiene notas pendientes de aprobacion ({{cantidad}}) </a>{{/notas}}</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Publicaciones <i class="icofont-newspaper icofont-1x"></i></h5>
                    <p class="card-text">Aquí se agrupan las publicaciones creadas por los contenidistas</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#notasPublicaciones}}<a href="/aprobaciones/notasEnPublicacionesPendientes">Tiene publicaciones pendientes de aprobación ({{cantidad}}) </a>{{/notasPublicaciones}}</small>
                </div>
            </div>

        </div>
        <div class="card-deck my-4">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Secciones <i class="icofont-chart-flow-1 icofont-1x"></i></h5>
                    <p class="card-text">Aquí se agrupan las secciones creadas por los contenidistas</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#secciones}}<a href="/aprobaciones/notasEnPublicacionesPendientes">Tiene secciones pendientes de aprobación ({{cantidad}}) </a>{{/secciones}}</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Revistas/diarios <i class="icofont-files-stack icofont-1x"></i></h5>
                    <p class="card-text">Aquí se agrupan las revistas/diarios creadas por los contenidistas</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#revistasDiarios}}<a href="/aprobaciones/notasEnPublicacionesPendientes">Tiene revistas/diarios pendientes de aprobación ({{cantidad}}) </a>{{/revistasDiarios}}</small>
                </div>
            </div>
        </div>


    </div>
</div>
{{> footer}}
