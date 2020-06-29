document.addEventListener('DOMContentLoaded', () =>{
  const boton = document.getElementById('modo-oscuro')
  boton.addEventListener('click', () =>{
    const main = document.getElementById('main')
    const brand = document.getElementById('brand')
    const mensaje = document.getElementById('mensaje-fort')
    const tarjetas = document.getElementsByClassName('tarjeta')
    
   

    for (var i = 0; i < tarjetas.length; i++) {
     tarjetas[i].style.color = "black"; // No es necesario llamar a myNodeList.item(i) en JavaScript
    }
    
    main.classList.toggle('modo-oscuro')
    mensaje.classList.toggle('d-none')


  })
})