<?php
// Inicializar variables
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servidor = "localhost";
    $usuario_bd = "root"; // Cambia esto con el nombre de usuario correcto
    $contrasena_bd = ""; // Cambia esto con la contraseña correcta
    $base_de_datos = "inicio";

    $enlace = mysqli_connect($servidor, $usuario_bd, $contrasena_bd, $base_de_datos);

    // Verificar la conexión
    if (!$enlace) {
        die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
    }

    // Validación de datos
    if (empty($_POST["usuario"]) || empty($_POST["contrasena"])) {
        $error_message = 'Todos los campos son obligatorios.';
    } else {
        $usuario = mysqli_real_escape_string($enlace, $_POST["usuario"]);
        $contrasena = mysqli_real_escape_string($enlace, $_POST["contrasena"]);

        // Verificación de usuario y contraseña
        $consulta = "SELECT * FROM personales WHERE usuario='$usuario' AND contrasena='$contrasena'";
        $resultado = mysqli_query($enlace, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            session_start();
            $_SESSION["usuario"] = $usuario;

            // Redirigir a la página del curso
            header("Location: curso.php");
            exit();
        } else {
            $error_message = 'Usuario o contraseña incorrectos.';
        }
    }

    // Cerrar la conexión
    mysqli_close($enlace);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrystalTeam Login</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Asegúrate de que el CSS de la plantilla esté vinculado aquí -->
    <style>
        /* Puedes combinar estos estilos con el CSS existente en `style.css` para mantener la consistencia */
        section {
            margin: 20px;
            text-align: center;
        }

        article {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            display: inline-block;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: white;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .error-message {
            color: red;
            font-weight: bold;
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
                    <a href="index.html" class="nav-item nav-link">Inicio </a>
                    <a href="about.html" class="nav-item nav-link">Sobre Nosotros </a>
                    <a href="contact.html" class="nav-item nav-link">Contacto</a>
                </div>
                <a href="registro.php" class="btn btn-primary px-4"> Registrarse </a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Iniciar Sesión</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0">Inicia sesión para ingresar al curso. Tu usuario y contraseña se te otorgaron al finalizar tu registro.</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Login Form -->
    <section>
        <article>
            <?php
            // Mostrar mensaje de error si existe
            if (!empty($error_message)) {
                echo '<p class="error-message">' . $error_message . '</p>';
            }
            ?>
            <form method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" required />
                <br>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required />
                <br>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </article>
    </section>

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <img src="img/logo.jpeg" alt="Logo" style="height: 50px; width: auto;">
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
                        <p> Carretera Federal México - Pachuca Km 37.5, CP 55740, Col. Sierra Hermosa, Tecámac, 
                            Estado de, 55740 San Martín Azcatepec, Méx </p>
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
</body>
</html>