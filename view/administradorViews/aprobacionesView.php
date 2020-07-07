{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}

    <div id="blog" class="blog col-md-9">
        {{#alert}}<div class="alert alert-{{class}}" role="alert"><p>{{message}}</p></div>{{/alert}}
            <div class="section-title">
                <h2>Contenidos pendientes</h2>
                <p>Aquí podrá aprobar secciones, revistas, publicaciones y notas pendientes de aprobacion</p>
            </div>

        <div class="card-deck my-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notas <i class=" icofont-notepad icofont-1x"></i></h5>
                    <p class="card-text">Aquí podrá aprobar las nuevas notas solicitadas por los contenidistas.</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#notas}}<a href="/aprobaciones/notaspendientes"> Pendientes de aprobacion ({{cantidad}}) </a>{{/notas}}</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notas en publicaciones <i class="icofont-newspaper icofont-1x"></i></h5>
                    <p class="card-text">Aquí podrá aprobar las nuevas solicitudes de notas para publicaciones por los contenidistas.</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#notasPublicaciones}}<a href="/aprobaciones/notasEnPublicacionesPendientes">Pendientes de aprobación ({{cantidad}}) </a>{{/notasPublicaciones}}</small>
                </div>
            </div>

        </div>
        <div class="card-deck my-4">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Secciones <i class="icofont-chart-flow-1 icofont-1x"></i></h5>
                    <p class="card-text">Aquí podrá aprobar las nuevas secciones solicitadas por los contenidistas.</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#secciones}}<a href="/aprobaciones/seccionespendientes">Pendientes de aprobación ({{cantidad}}) </a>{{/secciones}}</small>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Revistas <i class="icofont-files-stack icofont-1x"></i></h5>
                    <p class="card-text">Aquí podrá aprobar las nuevas revistas solicitadas por los contenidistas.</p>
                    <p class="card-text">
                        <small class="text-muted">

                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{#revistas}}<a href="/aprobaciones/revistasPendientes">Pendientes de aprobación ({{cantidad}}) </a>{{/revistas}}</small>
                </div>
            </div>
        </div>


    </div>
</div>
{{> footer}}
