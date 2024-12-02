<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CrystalTeam</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <img src="img/logo.jpeg" alt="Logo" style="height: 50px; width: auto;">
                <span class="text-primary">CrystalTeam</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="Control_parental.php" class="nav-item nav-link active">Control parental</a>
                    <a href="redes_sociales.php" class="nav-item nav-link">Juegos</a>
                    <a href="riesgos.php" class="nav-item nav-link"> Riesgos </a>
                    <a href="curso.php" class="nav-item nav-link">Internet</a>
                    <a href="virus.php" class="nav-item nav-link">Virus</a>
                </div>
                <a href="index.html" class="btn btn-primary px-4"> Inicio </a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white"> Vulnerabilidades</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0">Ess una debilidad que los atacantes pueden explotar fácilmente. </p>
            </div>
        </div>
    </div>
    <!-- Header End -->

<!-- About Start 1-->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Texto -->
            <div class="col-lg-6">
                <h1 class="mb-4"> Vulnerabilidades de hardware </h1>
                <p> Las vulnerabilidades de hardware son defectos en el diseño físico del hardware que pueden ser explotados. 
                    Un ejemplo es Rowhammer, un exploit que aprovecha una debilidad en la memoria RAM. 
                    La RAM está compuesta por condensadores muy cercanos entre sí. Cuando un atacante accede repetidamente a 
                    una fila de memoria (martillando), las interferencias eléctricas causan que los datos en los condensadores vecinos 
                    se corrompan. Esto puede llevar a la corrupción de datos y a posibles brechas de seguridad.
                </p>
            </div>
            <!-- Imagen -->
            <div class="col-lg-5 d-none d-lg-block">
                <img class="img-fluid rounded" src="img/Vunerabilidades.png" alt="Descripción de la imagen">
            </div>
            <!-- Imagen -->
                    <li class="py-2 border-bottom"> Meltdown y Spectre son dos vulnerabilidades graves descubiertas en casi todas las CPU desde 1995.
                    <li>Meltdown permite a los atacantes leer toda la memoria de un sistema, lo que puede revelar datos confidenciales almacenados en la memoria de otros procesos o incluso en el sistema operativo.</li>
                    <li>Spectre permite a los atacantes leer los datos manejados por otras aplicaciones, ya que explota cómo las CPU predicen y ejecutan instrucciones.</li>
                    </li class="py-2 border-bottom">
                    <!-- Imagen -->
                    <div class="col-lg-6 d-none d-lg-block">
                        <img class="img-fluid rounded" src="img/sue.jpg" alt="Descripción de la imagen">
                    </div>
                    <!-- Imagen -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- About Start 1-->

<!-- About Start 2-->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Texto -->
            <div class="col-lg-6">
                <h1 class="mb-4"> Vulnerabilidades de software </h1>
                <p> Son como pequeños agujeros o errores en los programas y sistemas que usamos en las computadoras y teléfonos.
                    Imagina que tienes un libro de cuentos y, por accidente, dejas un espacio vacío en una página. 
                    Si alguien encuentra ese espacio, podría usarlo para hacer cosas que no deberían hacer, como leer partes secretas 
                    del libro. En las computadoras, estos espacios vacíos o errores en los programas pueden permitir 
                    a las personas hacer cosas malas, como robar información o hacer que el programa no funcione bien. Por eso, 
                    los programadores tratan de encontrar y arreglar estos errores para que los programas sean seguros y 
                    no permitan que los hackers hagan cosas dañinas.</p>
            </div>
            <!-- Imagen -->
            <div class="col-lg-4 d-none d-lg-block">
                <img class="img-fluid rounded" src="img/s.png" alt="Descripción de la imagen">
            </div>
            <!-- Imagen -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- About End 2-->

<!-- About Start 3-->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Texto -->
            <div class="col-lg-6">
                <h1 class="mb-4"> Categorización de vulnerabilidades de software </h1>
                    <li class="py-2 border-bottom"> Desbordamiento de búfer: Cuando un programa escribe más datos de los que debe, lo que puede causar errores o problemas.</li>
                    <li class="py-2 border-bottom"> Meltdown permite a los atacantes leer toda la memoria de un sistema, lo que puede revelar datos confidenciales almacenados en la memoria de otros procesos o incluso en el sistema operativo.</li>
                    <li class="py-2 border-bottom"> Entrada no validada: Datos peligrosos enviados a un programa pueden hacer que se comporte mal.</li>
                    <li class="py-2 border-bottom"> Condiciones de carrera: Cuando los eventos no ocurren en el orden correcto, causando fallos. Como primero comer y luego hacer la comida, no puedes comer si no haces la comida primero </li>
                    <li class="py-2 border-bottom"> Debilidad en las prácticas de seguridad: Usar técnicas de seguridad no probadas puede causar problemas. </li>
                    <li class="py-2 border-bottom"> Condiciones de carrera: Cuando los eventos no ocurren en el orden correcto, causando fallos. </li>
                    <li class="py-2 border-bottom"> Condiciones de carrera: Cuando los eventos no ocurren en el orden correcto, causando fallos. </li>
                    <li class="py-2 border-bottom"> Problemas de control de acceso: Fallos en cómo se permite a las personas usar el software. </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- About Start 3-->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">CrystalTeam</span>
                </a>
                <p>Educar a los niños en ciberseguridad es esencial para que comprendan los riesgos en línea y aprendan a proteger su privacidad, 
                    identidad y seguridad digital desde jóvenes.</p>
                <div class="d-flex justify-content-start mt-4">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Ponte en contacto</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Dirección</h5>
                        <p> </p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Teléfono</h5>
                        <p>+52 55 4769 5685</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Enlaces rápidos</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a href="index.html" class="nav-item nav-link">Inicio </a>
                    <a href="about.html" class="nav-item nav-link">Sobre Nosotros </a>
                    <a href="contact.html" class="nav-item nav-link">Contacto</a>
                </div>
            </div>
            <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primary font-weight-bold" href="#">CrystalTeam</a>. Tolos los dereches reservados, por
                <a class="text-primary font-weight-bold" href=>CrystalTeam</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
