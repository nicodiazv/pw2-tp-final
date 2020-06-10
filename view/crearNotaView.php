<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Infonete Noticias</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <!-- <link href="vendor/owl.carousel/owl.carousel.min.css" rel="stylesheet"> -->
  <link href="vendor/venobox/venobox.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">

  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="">

  <!-- ======= Header ======= -->
  <header id="header" class="header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html" class="scrollto font-weight-bold">INFONETE</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="inicio-contenidista.html" class="font-weight-bold">Administración</a></li>
          <li><a href="diarios-contenidista.html" class="font-weight-bold ">Creación de diarios</a></li>
          <li class="active"><a href="#" class="font-weight-bold">Creación de notas</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- End Header -->


  <!-- Main -->
  <main id="main container">
    <div class="row justify-content-around">

      <!-- Sidebar -->
      <div class="col-lg-2 mt-2 ml-3">

        <h3>Ricardo Fort</h3>
        <h5>Contenidista</h5>
        <a href="index.html" class="btn btn-outline-dark btn-sm">Cerrar sesión</a>

        <!-- Categorias -->
        <h3 class="h5 mt-5">Mis notas</h3>
        <div class="categories">
          <ul>
            <li><a href="#">General <span>(25)</span></a></li>
            <li><a href="#">Salud <span>(12)</span></a></li>
            <li><a href="#">Politica <span>(14)</span></a></li>
            <li><a href="#">Deportes <span>(5)</span></a></li>
            <li><a href="#">Espectaculos <span>(22)</span></a></li>
          </ul>
        </div>
        <!-- End Categorias-->

        <!-- Clima de google -->
        <div class="">
          <h1 class="display-4 btn-primary p-4">Clima de Google</h1>
        </div>
        <!-- End Clima de google -->
      </div>
      <!-- End Sidebar -->

      <!-- ======= Crear nota Section ======= -->
      <section id="" class="contact col-md-9">
        <div class="container-fluid" data-aos="fade-up">
          <div class="col-lg-12 data-aos=" fade-left" data-aos-delay="100">
            <div class="section-title">
              <h2>Agregar una nota</h2>
            </div>
            <!-- formulario para crear una nota -->
            <form action="#" method="POST" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Título de la nota"
                    required />
                </div>
                <div class="col-md-6 form-group">
                  <select class="form-control btn-border border" required>
                    <option value="" selected>Seleccione un diario para incluir la nota</option>
                    <option value="item 1">Diario 1</option>
                    <option value="item 2">Diario 2</option>
                    <option value="item 3">Diario 3</option>
                    <option value="item 4">Diario 4</option>
                    <option value="item 5">Diario 5</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" name="ubicacion" class="form-control" id="name" placeholder="Ubicación de la nota"
                    required />
                </div>
                <div class="col-md-6 form-group ">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Seleccionar imagen para la nota</label>
                </div>
                <div class="form-group col-md-12">
                  <textarea class="form-control" name="cuerpo" rows="5" placeholder="Escriba el cuerpo de la nota"
                    required></textarea>
                </div>
                <label for="basic-url">Link para más información</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://</span>
                  </div>
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                </div>
                <div class="text-center col-md-12">
                  <button type="submit" class="btn-block">Crear nota</button>
                </div>
            </form>
            <!-- END formulario para crear una nota -->
          </div>
        </div>
      </section>
      <!-- ======= END Crear nota Section ======= -->
    </div>
  </main><!-- End Main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <h3>Integrantes</h3>
            <p>Nicolás Diaz Velar</p>
            <p>Javier Terranova</p>
            <p>Sebastian Tofano</p>
            <p>Julian Antonuccio</p>
          </div>
        </div>
      </div>
  </footer>
  <!-- End Footer -->

  <!-- Flecha para subir al principio y preloader de la vista -->
  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader">Vista para crear nota</div>

  <!-- Vendor JS Files -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="vendor/venobox/venobox.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>