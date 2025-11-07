<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = htmlspecialchars(trim($_POST["name"]));
    $apellido = htmlspecialchars(trim($_POST["surname"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    if (empty($nombre) || empty($apellido) || empty($email) || empty($mensaje)) {
        echo "<h3 style='color:red;'>Por favor, complete todos los campos.</h3>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h3 style='color:red;'>El correo electrónico no es válido.</h3>";
        exit;
    }

    $destinatario = "franco.iglina@davinci.edu.ar";
    $asunto = "Nuevo mensaje del formulario de contacto";

    $cuerpo = "
    Has recibido un nuevo mensaje desde el formulario web:
    ------------------------------------
    Nombre: $nombre
    Apellido: $apellido
    Email: $email
    Mensaje:
    $mensaje
    ------------------------------------
    Enviado el " . date("d/m/Y H:i") . "
    ";

    $cabeceras = "From: $email\r\n";
    $cabeceras .= "Reply-To: $email\r\n";
    $cabeceras .= "X-Mailer: PHP/" . phpversion();

    if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
        echo "<h3 style='color:green;'>¡Gracias $nombre! Tu mensaje ha sido enviado correctamente.</h3>";
    } else {
        echo "<h3 style='color:red;'>Hubo un error al enviar el mensaje. Inténtalo nuevamente más tarde.</h3>";
    }

} else {
    echo "<h3 style='color:red;'>Acceso no permitido.</h3>";
}
?>
