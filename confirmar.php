<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Conexión a la base de datos
$servidor = "localhost";
$usuario_bd = "root";
$clave_bd = "";
$baseDeDatos = "inicio";
$enlace = mysqli_connect($servidor, $usuario_bd, $clave_bd, $baseDeDatos);

if (!$enlace) {
    die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar el token en la tabla temporal
    $consulta = "SELECT * FROM temporales WHERE token='$token'";
    $resultado = mysqli_query($enlace, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $datos = mysqli_fetch_assoc($resultado);
        $nombre = $datos['nombre'];
        $apellidos = $datos['apellidos'];
        $correo = $datos['correo'];
        $usuario = $datos['usuario'];
        $contrasena = $datos['contrasena'];

        // Insertar el nuevo usuario en la tabla principal
        $insertarDatos = "INSERT INTO personales (nombre, apellidos, correo, usuario, contrasena) VALUES ('$nombre', '$apellidos', '$correo', '$usuario', '$contrasena')";
        
        if (mysqli_query($enlace, $insertarDatos)) {
            // Borrar el registro de la tabla temporal
            $borrarDatos = "DELETE FROM temporales WHERE token='$token'";
            mysqli_query($enlace, $borrarDatos);
            
            $mensaje = "Tu cuenta ha sido activada exitosamente. Aquí están tus credenciales:<br><br>
                        Usuario: $usuario<br>
                        Contraseña: $contrasena<br><br>
                        Es responsabilidad del usuario guardar esta información";
        } else {
            $mensaje = "Error al activar la cuenta.";
        }
    } else {
        $mensaje = "Token inválido o ya utilizado.";
    }
} else {
    $mensaje = "No se proporcionó un token.";
}

// Cerrar la conexión
mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
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
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
        }

        section {
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .message {
            font-size: 18px;
            margin-top: 10px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
        }
    </style>
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
                    <a href="index.html" class="nav-item nav-link active">Inicio </a>
                    <a href="about.html" class="nav-item nav-link">Sobre Nosotros </a>
                    <a href="registro.php" class="nav-item nav-link"> Registrarse </a>
                    <a href="contact.html" class="nav-item nav-link">Contacto</a>
                </div>
                <a href="login.php" class="btn btn-primary px-4"> Iniciar sesión </a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Section Start -->
    <section class="container mt-5">
        <article>
            <h2>Confirmación</h2>
            <div class="message">
                <?php echo $mensaje; ?>
            </div>
        </article>
    </section>
    <!-- Section End -->

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
                        <p> Poner dirreccion</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>poner correo de la empresa</p>
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

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>