{{> headeradministrador}}
<div class="row justify-content-around">
    {{> sideBarAdministrador}}
    <div class="col-md-8">
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
            <div class="section-title mt-4">
                <h2>Usuarios</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet corporis doloremque eos facere harum impedit nostrum praesentium tenetur. Cumque deleniti eaque exercitationem fugit </p>
            </div>
            <a href="/usuarios/registrar" class="btn btn-outline-primary mb-3">Crear usuario</a>
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
