<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - Crystalteam</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            padding-bottom: 60px;
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
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: white;
            max-width: 800px;
            margin: 20px auto;
            text-align: left;
        }

        h2 {
            color: #333;
            margin-top: 0;
        }

        footer {
            background-color: #333;
            color: rgb(214, 24, 24);
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
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

        document.addEventListener('click', function (event) {
            var isClickInsideMenu = document.getElementById('menu').contains(event.target);
            var isClickOnMenuButton = document.querySelector('.menu-button').contains(event.target);

            if (!isClickInsideMenu && !isClickOnMenuButton) {
                document.getElementById('menu').style.display = 'none';
            }
        });

        document.querySelectorAll('.menu a').forEach(function (element) {
            element.addEventListener('click', function () {
                document.getElementById('menu').style.display = 'none';
            });
        });
    </script>
</head>

<body>
    <header>
        <button class="menu-button" onclick="toggleMenu()">☰ Menú</button>
        <div id="menu" class="menu">
            <a href="index.html">Inicio</a>
            <a href="registro.php">Crear una cuenta</a>
            <a href="login.php">Iniciar sesión</a>
        </div>
        <img src="img/logo.png" alt="Crystalteam Logo" width="250">
    </header>

    <section>
        <article>
            <h2>Sobre Nosotros</h2>
            <h3>Misión</h3>
            <p>Otorgar habilidades a los niños de 8 a 12 años a navegar de manera segura y responsable en el mundo digital. Buscamos brindar educación integral sobre los peligros de Internet y equipar a los niños con la capacidad crítica para tomar decisiones informadas, fomentando un entorno en línea seguro y respetuoso.</p>
            <h3>Visión</h3>
            <p>Nos visualizamos como líderes en la promoción de la educación digital para niños, creando una generación consciente y segura en el mundo digital. Aspiramos a ser reconocidos por nuestro impacto positivo en la formación de ciudadanos digitales responsables y resilientes.</p>
            <h3>Valores</h3>
            <ul>
                <li><strong>Seguridad:</strong> Priorizar la seguridad de los niños en línea, proporcionando recursos y orientación que les ayuden a tomar decisiones informadas y a proteger su privacidad.</li>
                <li><strong>Colaboración:</strong> Fomentar la colaboración entre padres, maestros y la comunidad para crear un entorno de apoyo que refuerce la enseñanza de la educación digital y promueva la seguridad en línea.</li>
                <li><strong>Respeto:</strong> Promover un entorno en línea basado en el respeto mutuo, la diversidad y la inclusión. Enseñar a los niños a ser ciudadanos digitales responsables y respetuosos.</li>
                <li><strong>Desarrollo Personal:</strong> Buscar el desarrollo personal de cada niño, potenciando habilidades como la toma de decisiones informadas, la empatía digital y la resiliencia en línea.</li>
            </ul>
            <h3>Objetivos</h3>
            <p>Ser la empresa líder en la promoción de la educación digital y la ciberseguridad, brindando herramientas innovadoras y accesibles que empoderen a los usuarios para desenvolverse con confianza y seguridad en el mundo digital.</p>
        </article>
    </section>

    <footer>
        <p><span style="color:#ff0000">Copyright &copy; 2024 Crystalteam</span></p>
    </footer>
</body>

</html>





