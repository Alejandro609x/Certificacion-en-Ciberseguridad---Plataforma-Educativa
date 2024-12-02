Certificación en Ciberseguridad
Plataforma educativa sobre ciberseguridad, diseñada para enseñar conceptos fundamentales de forma interactiva y accesible.

Descripción
Este proyecto es un sitio web educativo desarrollado para promover el conocimiento sobre ciberseguridad. Combina tecnologías web modernas como PHP, MySQL, HTML, y CSS para ofrecer una experiencia dinámica que incluye:

Registro y login con validación de correo electrónico mediante PHPMailer.
Gestión de términos y condiciones para los usuarios.
Módulos educativos sobre:
Virus informáticos.
Riesgos en línea.
Seguridad digital.
Redes sociales.
Características
Autenticación de usuarios: Registro con validación por correo electrónico y login seguro.
Contenido educativo interactivo: Cursos y secciones diseñados para facilitar el aprendizaje de ciberseguridad.
Diseño intuitivo: Interfaz visualmente atractiva y amigable para los usuarios.
Funcionalidad modular: Fácil de expandir con nuevos cursos y temas.
Requisitos
Servidor local: Recomendado XAMPP.
Base de datos: MySQL (configurada en phpMyAdmin).
Librerías:
PHPMailer
PHP 7.4+.
Instalación
Clona este repositorio en tu servidor local:

bash
Copiar código
git clone https://github.com/tu-usuario/certificacion-ciberseguridad.git
Configura la base de datos:

Importa el archivo database.sql en phpMyAdmin.
Ajusta los parámetros de conexión en config.php (servidor, usuario, contraseña y nombre de base de datos).
Configura el envío de correos en enviarCorreo.php con tu cuenta de Gmail:

php
Copiar código
$mail->Username = 'tu-email@gmail.com';
$mail->Password = 'tu-contraseña';
Inicia tu servidor local y navega al sitio web.

Uso
Registro de usuarios: Completa el formulario de registro para recibir un correo de validación.
Cursos disponibles: Accede a las secciones para aprender sobre diversos temas de ciberseguridad.
Gestión de cuentas: Visualiza y administra tu perfil desde el sistema.
Contribuciones
¡Contribuciones son bienvenidas! Si deseas mejorar o expandir este proyecto, por favor sigue estos pasos:

Haz un fork del repositorio.
Crea una nueva rama:
bash
Copiar código
git checkout -b feature-nueva
Realiza tus cambios y confirma los commits.
Envía un pull request.

Estructura de Archivos:
Carpetas:

css: Contiene los archivos de estilo CSS para el diseño visual de tu sitio web.
img: Imágenes utilizadas en el sitio web.
js: Archivos JavaScript, posiblemente para interactividad o efectos en la web.
lib: Puede ser para bibliotecas adicionales o componentes específicos del proyecto.
mail: Probablemente contiene archivos relacionados con la funcionalidad de correo electrónico (como las configuraciones de PHPMailer).
PHPMailer-master: Carpeta que contiene el código de la librería PHPMailer para el envío de correos electrónicos.
Archivos principales:

about.html: Página que podría contener información sobre el sitio o el propósito del proyecto.
confirmar.php: Archivo PHP que maneja la confirmación de la cuenta de usuario o la verificación del correo electrónico.
contact.html: Página de contacto, posiblemente con un formulario para que los usuarios puedan comunicarse contigo.
Control_parental.php: Podría ser un archivo para gestionar el control parental en la plataforma (esto es una suposición basada en el nombre).
curso.php: Archivo que muestra el contenido de un curso sobre ciberseguridad o alguna temática educativa.
enviarCorreo.php: Archivo que maneja el envío de correos electrónicos (posiblemente de confirmación o notificación).
index.html: Página de inicio del sitio web.
login.php: Página para el inicio de sesión de los usuarios.
redes_sociales.php: Podría ser una página que muestre enlaces o información sobre redes sociales relacionadas con el proyecto.
registro.php: Página de registro de nuevos usuarios.
riesgos.php: Página que probablemente trata sobre los riesgos en línea y temas relacionados con la ciberseguridad.
seguridad.php: Página relacionada con la seguridad digital, puede incluir temas de protección en línea.
Sobre nosotros.php: Página que describe la empresa o el equipo detrás del proyecto.
tipos_informacion.php: Página que explica los diferentes tipos de información y su protección.
Flujo de Trabajo Posible:
Los usuarios comenzarán en la página index.html y navegarán a través de diferentes secciones, como registro.php para crear cuentas, login.php para iniciar sesión, y luego tendrán acceso a los cursos en curso.php y otros recursos educativos como riesgos.php y seguridad.php.

confirmar.php es crucial para el proceso de verificación de correo y activación de cuentas.

enviarCorreo.php se usa para el envío de correos, como la verificación del registro de los usuarios.

redes_sociales.php y Sobre nosotros.php proporcionan información adicional sobre el proyecto.![Captura de pantalla 2024-12-02 113657](https://github.com/user-attachments/assets/675d21b2-3e29-4756-96f2-f54d7960a1f2)
