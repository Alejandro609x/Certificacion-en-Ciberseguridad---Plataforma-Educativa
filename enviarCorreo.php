<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar las dependencias de PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Inicializar variables
$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDeDatos = "inicio";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

    // Verificar la conexión
    if (!$enlace) {
        die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
    }

    // Validación de datos
    if (empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["correo"])) {
        $error_message = 'Todos los campos son obligatorios.';
    } elseif (!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        $error_message = 'El correo electrónico no es válido.';
    } elseif (!isset($_POST["terms"]) || $_POST["terms"] != "aceptado") {
        $error_message = 'Debes aceptar los términos y condiciones.';
    } else {
        // Generar usuario y contraseña
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $correo = $_POST["correo"];
        $usuarioGenerado = strtolower(substr($nombre, 0, 3) . substr($apellidos, 0, 3));
        $contrasenaGenerada = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);

        // Verificar si el correo ya está registrado
        $consulta = "SELECT * FROM personales WHERE correo='$correo'";
        $resultado = mysqli_query($enlace, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            $error_message = 'El correo electrónico ya está registrado.';
        } else {
            // Insertar nuevo usuario
            $consulta_insertar = "INSERT INTO personales (nombre, apellidos, correo, usuario, contrasena) VALUES ('$nombre', '$apellidos', '$correo', '$usuarioGenerado', '$contrasenaGenerada')";
            if (mysqli_query($enlace, $consulta_insertar)) {
                // Enviar correo de confirmación
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
                    $mail->SMTPAuth = true;
                    $mail->Username = '@gmail.com'; // Tu dirección de correo electrónico
                    $mail->Password = ''; // Tu contraseña de correo electrónico
                    $mail->SMTPSecure = 'tls'; // Habilitar el cifrado TLS
                    $mail->Port = 587; // Puerto TCP para TLS

                    // Destinatarios
                    $mail->setFrom('@gmail.com', 'Crystalteam');
                    $mail->addAddress($correo); // Dirección del destinatario

                    // Contenido
                    $mail->isHTML(true);
                    $mail->Subject = 'Tu cuenta ya esta dada de alta !FELIZIDADES¡';
                    $mail->Body    = "Hola $usuarioGenerado,<br><br>Tu cuenta ha sido creada sin problemas. Aqui estan tus detalles:<br><br>Usuario: $usuarioGenerado<br>Contraseña: $contrasenaGenerada<br><br>Gracias por registrarte en Crystalteam.<br><br>Saludos,<br>El equipo de Crystalteam";
                    $mail->Encoding = 'base64'; // Configura la codificación de caracteres

                    // Enviar el correo
                    $mail->send();
                    $success_message = 'Registro exitoso. Se ha enviado un correo de confirmación.';
                } catch (Exception $e) {
                    $error_message = 'Error al enviar el correo: ' . $mail->ErrorInfo;
                }
            } else {
                $error_message = 'Error al registrar la cuenta: ' . mysqli_error($enlace);
            }
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
    <title>Crystalteam Registro</title>
    <style>
        /* Estilos para la página */
        body {
            font-family: 'Arial', sans-serif;
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
        .menu-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #555;
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
        }
        .menu-button:hover {
            background-color: #777;
        }
        .menu {
            display: none;
            position: absolute;
            top: 60px;
            left: 10px;
            background-color: #333;
            border-radius: 8px;
            overflow: hidden;
            z-index: 1000;
        }
        .menu a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
        }
        .menu a:hover {
            background-color: #555;
        }
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
        .terms {
            margin-top: 20px;
        }
        .terms input[type="checkbox"] {
            margin-right: 5px;
        }
        .error-message {
            color: red;
            font-size: larger;
            margin-top: 10px;
        }
        .success-message {
            color: green;
            font-size: large;
            margin-top: 10px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            position: relative;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 20px;
            background-color: red;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }
        function showTerms() {
            var modal = document.getElementById('termsModal');
            modal.style.display = 'block';
        }
        function closeModal() {
            var modal = document.getElementById('termsModal');
            modal.style.display = 'none';
        }
    </script>
</head>
<body>
    <header>
        <button class="menu-button" onclick="toggleMenu()">☰ Menú</button>
        <div id="menu" class="menu">
            <a href="index.html">Inicio</a>
            <a href="login.php">Iniciar Sesión</a>
            <a href="Sobre nosotros.php">Sobre Nosotros</a>
        </div>
        <img src="img/logo.png" alt="Crystalteam Logo" />
    </header>
    <section>
        <article>
            <h2>Registro para el curso</h2>
            <?php
            // Mostrar mensaje de error si existe
            if (!empty($error_message)) {
                echo '<div class="error-message">' . $error_message . '</div>';
            }
            // Mostrar mensaje de éxito si existe
            if (!empty($success_message)) {
                echo '<div class="success-message">' . $success_message . '</div>';
            }
            ?>
            <form method="post" action="">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>

                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>

                <label for="terms">
                    <input type="checkbox" id="terms" name="terms" value="aceptado" required>
                    Acepto los <a href="#" onclick="showTerms()">términos y condiciones</a>
                </label>

                <button type="submit">Registrar</button>
            </form>
        </article>
    </section>

    <!-- Ventana Modal para los términos y condiciones -->
    <div id="termsModal" class="modal">
        <div class="modal-content">
            <button class="close-button" onclick="closeModal()">×</button>
            <h2>Términos y Condiciones</h2>
            <p>Estos son los términos y condiciones...</p>
        </div>
    </div>
</body>
</html>

