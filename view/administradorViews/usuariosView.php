{{> headeradministrador}}
<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div class="col-md-9">
        <div class="w3-container w3-content w3-center w3-padding-64" id="band">
            <div class="section-title mt-4">
                <h2>Usuarios</h2>
                <p>Aquí podrá crear o modificar usuarios ya existentes. </p>
            </div>
            <a href="/usuarios/registrar" class="btn btn-outline-success mb-3">Crear usuario</a>
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Editar</th>
                </tr>
                {{#usuarios}}
                <tr>
                    <td>{{nombre}}</td>
                    <td>{{apellido}}</td>
                    <td> <a href="/usuarios/editar/{{id}}">Editar</a> </td>
                </tr>
                {{/usuarios}}
            </table>
        </div>
    </div>
</div>
{{> footer}}
