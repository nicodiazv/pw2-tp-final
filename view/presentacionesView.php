{{> header}}
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Presentaciones</h2>
    <table class="w3-table">
        <tr>
            <th>Presentacion</th>
            <th>fecha</th>
            <th>precio</th>
        </tr>
        {{#presentaciones}}
        <tr>
            <td>{{nombre}}</td>
            <td>{{fecha}}</td>
            <td>{{precio}}</td>
        </tr>
        {{/presentaciones}}
    </table>
</div>
{{> footer}}