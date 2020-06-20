{{> headeradministrador}}

<div class="row justify-content-around">
    {{> sideBarAdministrador}}
    <div class="col-md-8 my-4">
        <h1 class="display-4">Pendientes</h1>
        {{#alert}}
        <div class="alert alert-{{class}}" role="alert">
            {{message}}
        </div>
        {{/alert}}
        <div class="col-md-8 my-4">
            <a href="/aprobaciones/revistasPendientes">Revistas</a>
        </div>
        <div class="col-md-8 my-4">
            <a href="/aprobaciones/seccionespendientes">Secciones</a>
        </div>
        <div class="col-md-8 my-4">
            <a href="/aprobaciones/notaspendientes">Notas</a>
        </div>

    </div>
</div>
{{> footer}}
