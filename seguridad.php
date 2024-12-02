<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crystalteam - Qué es Ciberseguridad</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            padding-bottom: 60px; /* Espacio para evitar que el pie de página cubra contenido */
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
        }

        article {
            margin-bottom: 20px;
        }

        h2,
        h1 {
            color: #333;
        }

        p {
            margin-bottom: 16px;
        }

        .video-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0; /* Quitamos el margen para que no haya espacio adicional */
        }

        .message {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            text-align: left;
            color: #333;
            font-weight: bold;
            position: relative;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ce2d2d;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 16px;
            cursor: pointer;
        }

        .button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 10px;
            z-index: 1000;
            width: 300px;
            text-align: center;
        }

        .popup input {
            width: 80%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .popup .button {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <header>
        <img src="img/logo.png" alt="Crystalteam Logo" width="250">
        <button class="menu-button" onclick="toggleMenu()">☰ Cursos</button>
        <div id="menu" class="menu">
            <a href="index.html">Inicio</a>
            <a href="virus.php">Virus</a>
            <a href="tipos_informacion.php">Tipos de informacion</a>
            <a href="curso.php">Ciberseguridad</a>
            <a href="redes_sociales.php">Riesgos en las redes sociales</a>
            <a href="riesgos.php">Riesgos en la red</a>
        </div>
    </header>

    <section>
        <h1>¿Qué es la Ciberseguridad y para qué sirve?</h1>
        <p>La ciberseguridad es como tener un guardián o un superhéroe que protege nuestra información cuando usamos computadoras, tabletas o teléfonos. Este guardián se asegura de que nadie malo pueda robar nuestros datos, como fotos, juegos, o mensajes.</p>

        <h2>Cerraduras mágicas:</h2>
        <p>Imagina que tu computadora tiene cerraduras mágicas que solo tú puedes abrir con tu contraseña. Así, solo tú puedes entrar a tus cosas.</p>
        <button class="button" onclick="mostrarPopup()">Iniciar Juego</button>

        <div class="popup" id="popup">
            <h3>Crea una Cerradura Mágica (Contraseña)</h3>
            <p>Tu contraseña debe tener al menos 8 caracteres, incluir mayúsculas, minúsculas, números y símbolos.</p>
            <input type="password" id="password" placeholder="Ingresa tu contraseña">
            <button class="button" onclick="verificarContrasena()">Verificar</button>
            <button class="close-button" onclick="cerrarPopup()">×</button>
            <div id="resultado"></div>
        </div>

        <div class="video-container">
            <video width="600" controls>
                <source src="vid/Privacidad.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>

        <h2>¿Cómo lo hace?</h2>
        <p><strong>Detectores de monstruos:</strong> El guardián de la ciberseguridad también tiene detectores de monstruos (virus y hackers) que intentan entrar a tu computadora. Cuando detecta uno, lo atrapa y lo expulsa.</p>

        <h2>¿Para qué sirve?</h2>
        <p><strong>Protección de tus secretos:</strong> La ciberseguridad mantiene seguros tus secretos y datos privados. Por ejemplo, tus fotos familiares, tus juegos favoritos y tus mensajes con amigos.</p>
        <p><strong>Seguridad en los juegos:</strong> Al jugar en línea, el guardián de la ciberseguridad asegura que nadie haga trampa o intente robar tu cuenta de juego.</p>
        <p><strong>Navegación segura:</strong> Cuando navegas en Internet, la ciberseguridad te protege de sitios web peligrosos que pueden intentar robar tu información.</p>

        <h2>Un ejemplo en la vida real</h2>
        <p>Cisco, una empresa muy grande que ayuda a proteger las computadoras y las redes, crea estas cerraduras mágicas y detectores de monstruos. Ellos trabajan para que todas las personas, desde niños hasta adultos, puedan usar sus dispositivos con seguridad y sin preocupaciones.</p>

        <h2>Imagina que...</h2>
        <p>Tienes una fortaleza (tu computadora).</p>
        <p>Un guardián súper fuerte y astuto (ciberseguridad de Cisco) vigila las puertas.</p>
        <p>Este guardián usa cerraduras mágicas (contraseñas) y detectores de monstruos (antivirus) para mantener fuera a los enemigos (hackers y virus).</p>
        <p>Así, puedes jugar, estudiar y hablar con tus amigos de manera segura. ¡Y ese guardián nunca duerme, siempre está vigilando para que estés seguro!</p>

        <p><strong>Fuente:</strong> Cisco ofrece programas y herramientas para mejorar la ciberseguridad y proteger la información personal y profesional en la red. Puedes aprender más sobre ellos en su sitio web oficial.</p>
    </section>

    <footer>
        <p><span style="color:#ff0000">Copyright &copy; 2024 Crystalteam</span></p>
    </footer>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('menu');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }

        function mostrarPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        function cerrarPopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('resultado').innerHTML = '';
        }

        function verificarContrasena() {
            const contrasena = document.getElementById('password').value;
            const resultado = document.getElementById('resultado');

            const mayuscula = /[A-Z]/;
            const minuscula = /[a-z]/;
            const numero = /[0-9]/;
            const simbolo = /[!@#$%^&*(),.?":{}|<>]/;

            if (contrasena.length < 8) {
                resultado.innerHTML = 'La contraseña debe tener al menos 8 caracteres.';
            } else if (!mayuscula.test(contrasena)) {
                resultado.innerHTML = 'La contraseña debe incluir al menos una letra mayúscula.';
            } else if (!minuscula.test(contrasena)) {
                resultado.innerHTML = 'La contraseña debe incluir al menos una letra minúscula.';
            } else if (!numero.test(contrasena)) {
                resultado.innerHTML = 'La contraseña debe incluir al menos un número.';
            } else if (!simbolo.test(contrasena)) {
                resultado.innerHTML = 'La contraseña debe incluir al menos un símbolo.';
            } else {
                resultado.innerHTML = '¡Ganaste! El monstruo (hacker) no puede entrar.';
            }
        }

        // Cerrar el menú si se hace clic fuera de él
        document.addEventListener('click', function(event) {
            var menu = document.getElementById('menu');
            var menuButton = document.querySelector('.menu-button');
            if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
    </script>

</body>

</html>
