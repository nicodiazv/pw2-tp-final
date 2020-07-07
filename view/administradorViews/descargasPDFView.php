{{> headeradministrador}}

<div class="row col-12 justify-content-between">
    {{> sideBarAdministrador}}
    <div class="col-md-9 my-4">

        <!-- ======= Icon Boxes Section ======= -->
        <section id="icon-boxes" class="icon-boxes">
            <div class="container">
                <div class="section-title">
                    <h2>Obtener información en formato PDF</h2>
                    <p>Aquí podrá descargas información en formato PDF.</p>
                </div>
                <div class="row justify-content-around">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxs-file-pdf"></i></div>
                            <h4 class="title"><a href="">Obtener Contenidistas</a></h4>
                            <p class="description">Descargar un listado en formato PDF de todos los contenidistas que
                                administras los diarios y las notas en la página web.</p>
                            <button 
                            id="contenidistas_pdf"
                            type="button"
                                    class="btn btn-outline-success btn-block mt-2 btn-lg font-weight-bold">Descargar PDF<i
                                        class='bx bx-download bx-fade-down'></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                         data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxs-file-pdf"></i></div>
                            <h4 class="title"><a href="">Obtener Clientes</a></h4>
                            <p class="description">Descargar un listado en formato PDF de todos los clientes que
                                visualizan los diarios y las notas en la página web.</p>
                            <button 
                            id="clientes_pdf"
                            type="button"
                                    class="btn btn-outline-success btn-block mt-2 btn-lg font-weight-bold">Descargar PDF<i
                                        class='bx bx-download bx-fade-down'></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                         data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxs-file-pdf"></i></div>
                            <h4 class="title"><a href="">Obtener Productos</a></h4>
                            <p class="description">Descargar un listado en formato PDF de todos los productos que son
                                administrados los diarios y las notas en la página web.</p>
                            <button 
                            id="productos_pdf"
                            type="button"
                                    class="btn btn-outline-success btn-block mt-2 btn-lg font-weight-bold">Descargar PDF<i
                                        class='bx bx-download bx-fade-down'></i></button>
                        </div>
                    </div>


                </div>

            </div>
        </section><!-- End Icon Boxes Section -->

    </div>
</div>
<script>
    document.getElementById('contenidistas_pdf').addEventListener('click', () => window.open('/descargas/contenidistas', '_blank') )
    document.getElementById('clientes_pdf').addEventListener('click', () => window.open('/descargas/clientes', '_blank') )
    document.getElementById('productos_pdf').addEventListener('click', () => window.open('/descargas/productos', '_blank') )

</script>
{{> footer}}
