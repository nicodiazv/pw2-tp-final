{{> header}}

<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Registrate!</h2>
    <form action="/registro/registrar" method="POST">
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="apellido" placeholder="apellido">
        <input type="text" name="email" placeholder="email">
        <input type="pasword" name="password" placeholder="password" >
        <input type="submit" value="Enviar">
    </form>
</div>
{{> footer}}
