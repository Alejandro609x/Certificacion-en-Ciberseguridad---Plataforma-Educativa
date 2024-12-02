<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar variables
    $error_message = '';
    $success_message = '';

    // Conexión a la base de datos
    $servidor = "localhost";
    $usuario_bd = "root";
    $clave_bd = "";
    $baseDeDatos = "inicio";
    $enlace = mysqli_connect($servidor, $usuario_bd, $clave_bd, $baseDeDatos);

    // Verificar la conexión
    if (!$enlace) {
        die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
    }

    // Validación de datos
    if (empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["correo"]) || empty($_POST["fecha_nacimiento"])) {
        $error_message = 'Todos los campos son obligatorios.';
    } elseif (!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        $error_message = 'El correo electrónico no es válido.';
    } elseif (!isset($_POST["terms"]) || $_POST["terms"] != "aceptado") {
        $error_message = 'Debes aceptar los términos y condiciones.';
    } else {
        // Validar edad
        $fechaNacimiento = new DateTime($_POST["fecha_nacimiento"]);
        $hoy = new DateTime();
        $edad = $hoy->diff($fechaNacimiento)->y;

        if ($edad < 5 || $edad > 17) {
            $error_message = 'Debes tener entre 8 y 10 años para registrarte.';
        } else {
            // Generar usuario y contraseña basados en los datos ingresados
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $correo = $_POST["correo"];
            $usuarioGenerado = strtolower(substr($nombre, 0, 3) . substr($apellidos, 0, 3)); // Ejemplo: primeras 3 letras del nombre + primeras 3 letras de apellidos
            $contrasenaGenerada = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
            $token = bin2hex(random_bytes(16)); // Generar un token único

            // Verificar si el correo ya está registrado
            $consulta = "SELECT * FROM personales WHERE correo='$correo'";
            $resultado = mysqli_query($enlace, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                $error_message = 'El correo electrónico ya está registrado.';
            } else {
                // Insertar nuevo usuario en la tabla temporal
                $insertarDatos = "INSERT INTO temporales (nombre, apellidos, correo, usuario, contrasena, token) VALUES ('$nombre', '$apellidos', '$correo', '$usuarioGenerado', '$contrasenaGenerada', '$token')";

                if (mysqli_query($enlace, $insertarDatos)) {
                    $success_message = 'Registro exitoso. Se ha enviado un correo de confirmación.';

                    // Enviar correo de confirmación
                    $mail = new PHPMailer(true);

                    try {
                        // Configuración del servidor SMTP
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = '@gmail.com'; // Tu dirección de correo
                        $mail->Password = ''; // Tu contraseña
                        $mail->SMTPSecure = 'tls'; // O 'ssl'
                        $mail->Port = 587; // O 465 para ssl

                        // Remitente y destinatario
                        $mail->setFrom('@gmail.com', 'Crystalteam');
                        $mail->addAddress($correo);

                        // Contenido del correo
                        $mail->isHTML(true);
                        $mail->Subject = 'Confirmacion de Registro en Crystalteam';
                        $mail->Body    = "Hola $usuarioGenerado,<br><br>Tu cuenta ha sido creada sin problemas. Haz clic en el siguiente enlace para activar tu cuenta:<br><br><a href='http://localhost/Certificacion/confirmar.php?token=$token'>Activar cuenta</a><br><br>Gracias por registrarte en Crystalteam.<br><br>Saludos,<br>El equipo de Crystalteam";
                        $mail->Encoding = 'base64'; // Configura la codificación de caracteres

                        $mail->send();
                    } catch (Exception $e) {
                        $error_message = "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
                    }
                } else {
                    $error_message = 'Error al registrar la cuenta: ' . mysqli_error($enlace);
                }
            }
        }
    }

    // Cerrar la conexión
    mysqli_close($enlace);
}
?>

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

    <!-- Custom Styles for Modal -->
    <style>
        /* Estilo para el modal */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 600px; 
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Registro</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0">Necesitas registrarte para poder iniciar sesión en nuestro curso</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Registro Start -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="bg-light p-4 rounded shadow-sm">
                    <h4 class="mb-4">Formulario de Registro</h4>
                    <?php if (!empty($error_message)) : ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php elseif (!empty($success_message)) : ?>
                        <div class="alert alert-success"><?php echo $success_message; ?></div>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo electrónico:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>
                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" value="aceptado" required>
                            <label class="form-check-label" for="terms">Acepto los <a href="#" onclick="showModal()">términos y condiciones</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Registro End -->

    <!-- Términos Modal -->
    <div id="termsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Términos y Condiciones de CrystalTeam</h2>
            <p>Última actualización: 23 de agosto de 2024</p>
            <p>1. Aceptación de los términos: Al inscribirse en el curso ofrecido por CrystalTeam, 
                        usted acepta cumplir con los términos y condiciones aquí establecidos. 
                        Si no está de acuerdo con alguno de estos términos, no podrá participar en el curso.</p>
                    <p>2. Elegibilidad: El curso está diseñado específicamente para niños de entre 8 y 10 años de edad. 
                        Al inscribirse, el tutor o padre/madre del menor certifica que el participante cumple con este requisito de edad.</p>
                    <p>3. Inscripción y uso de la información: Para inscribirse en el curso, es necesario proporcionar información personal, 
                        como el nombre del niño, su edad, y un correo electrónico de contacto. 
                        CrystalTeam se compromete a proteger esta información conforme a nuestra política de privacidad.</p>
                    <p>4. Uso del curso: El curso está destinado exclusivamente para fines educativos. 
                        Los materiales del curso, incluyendo videos, actividades y recursos descargables, son propiedad de CrystalTeam y no pueden ser distribuidos, 
                        copiados o utilizados para otros fines sin nuestro consentimiento previo por escrito.</p>
                    <p>5. Seguridad en internet: El curso incluye información sobre seguridad en internet dirigida a niños. 
                        Sin embargo, CrystalTeam no se responsabiliza por la supervisión del uso de internet fuera del entorno del curso. 
                        Es responsabilidad de los tutores y padres/madres supervisar el uso de internet de los menores.</p>
                    <p>6. Comportamiento durante el curso: Se espera que todos los participantes mantengan un comportamiento respetuoso durante las sesiones del curso. 
                        Cualquier conducta inapropiada podría resultar en la expulsión del curso sin derecho a reembolso.</p>
                    <p>7. Modificaciones al curso: CrystalTeam se reserva el derecho de modificar el contenido del curso, su estructura, y las fechas de las sesiones sin previo aviso.
                        Nos comprometemos a notificar a los participantes sobre cualquier cambio significativo.</p>
                    <p>8. Limitación de responsabilidad: CrystalTeam no será responsable por cualquier daño, directo o indirecto, 
                        que pueda surgir del uso del curso o de la incapacidad para acceder a él. Esto incluye, pero no se limita a, problemas técnicos, 
                        pérdidas de datos, o cualquier otra circunstancia que pueda afectar el aprovechamiento del curso.</p>
                    <p>9. Enlaces a otros sitios: El curso puede contener enlaces a sitios web de terceros. 
                        CrystalTeam no se hace responsable del contenido o las políticas de privacidad de estos sitios.</p>
                    <p>10. Cancelación y reembolsos: En caso de cancelación por parte del participante, 
                        se deberá notificar con al menos 7 días de antelación para recibir un reembolso completo. 
                        No se otorgarán reembolsos por cancelaciones realizadas después de este período.</p>
                    <p>11. Modificaciones a los términos: CrystalTeam se reserva el derecho de actualizar o modificar estos términos y condiciones en cualquier momento.
                        Los cambios entrarán en vigor inmediatamente después de su publicación en nuestro sitio web.</p>
                    <p>12. Contacto: Si tiene alguna pregunta o inquietud sobre estos términos y condiciones, 
                        puede contactarnos a través del correo electrónico: crystalteamem@gmail.com.</p>
                    <p>13. Ley aplicable: Estos términos y condiciones se rigen por las leyes del país en el que opera CrystalTeam.</p>
        </div>
    </div>

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
                        <p>  </p>
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
    <a href="#" class="btn btn-primary py-3 px-4 back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Script para Modal -->
    <script>
        function showModal() {
            document.getElementById('termsModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('termsModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('termsModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>
