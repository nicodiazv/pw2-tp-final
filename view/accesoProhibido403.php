<style>
    body {
        background-color: #f1f1f1;
    }
    body .base {
        width: 100%;
        height: 100vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        flex-direction: column;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
    }
    body .base h1 {
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        font-family: 'Ubuntu', sans-serif;
        text-transform: uppercase;
        text-align: center;
        font-size: 30vw;
        display: block;
        margin: 0;
        color: #9ae1e2;
        position: relative;
        z-index: 0;
        animation: colors .4s ease-in-out forwards;
        animation-delay: 1.7s;
    }
    body .base h1:before {
        content: "U";
        position: absolute;
        top: -9%;
        right: 39.5%;
        transform: rotate(180deg);
        font-size: 15vw;
        color: #f6c667;
        z-index: -1;
        text-align: center;
        animation: lock .2s ease-in-out forwards;
        animation-delay: 1.5s;
    }
    body .base h2 {
        font-family: 'Cabin', sans-serif;
        color: #9ae1e2;
        font-size: 5vw;
        margin: 0;
        text-transform: uppercase;
        text-align: center;
        animation: colors .4s ease-in-out forwards;
        animation-delay: 2s;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
    }
    body .base h5 {
        font-family: 'Cabin', sans-serif;
        color: #9ae1e2;
        font-size: 2vw;
        margin: 0;
        text-align: center;
        opacity: 0;
        animation: show 2s ease-in-out forwards;
        color: #ca3074;
        animation-delay: 3s;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
    }

    @keyframes lock {
        50% {
            top: -4%;
        }
        100% {
            top: -6%;
        }
    }
    @keyframes colors {
        50% {
            transform: scale(1.1);
        }
        100% {
            color: #ca3074;
        }
    }
    @keyframes show {
        100% {
            opacity: 1;
        }
    }
    .boton_personalizado{
        text-decoration: none;
        font-family: "Open Sans", "DejaVu Sans", sans-serif;
        padding: 10px;
        font-weight: 600;
        font-size: 20px;
        color: #ffffff;
        background-color: #ca3074;
        border-radius: 10px;
    }
    .boton_personalizado:hover{
        color: #1883ba;
        background-color: #f1f1f1;
    }

</style>
<a href="/" class="boton_personalizado " >Volver al Home</a>
<div class="base io">
    <h1 class="io">403</h1>
    <img src="view/img/ricardo_403.gif" alt="Gif Ricardo Fort" style="width: 250px">

    <h2>Acceso prohibido</h2>



</div>