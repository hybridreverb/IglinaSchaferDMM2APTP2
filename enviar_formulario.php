<?php
if (isset($_POST["enviar"])){
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $email=$_POST["email"];
    $mensaje=$_POST["mensaje"];

    $destinatario="franco.iglina@gmail.com";
    $asunto="Nuevo mensaje de $email";

    $contenido="Nombre: $nombre \n";
    $contenido="Apellido: $apellido \n";
    $contenido.="Email: $email \n";
    $contenido.="Mensaje: $mensaje";

    $header="From: housemd@davinci.com";

    $mail=mail($destinatario,$asunto,$contenido,$header);

    if($mail){
        echo "<h3 style='color:green;'>¡Gracias $nombre! Tu mensaje ha sido enviado correctamente.</h3>";
    }else{
        echo "<h3 style='color:red;'>Hubo un error al enviar el mensaje. Inténtalo nuevamente más tarde.</h3>";
    }
    } else {
    echo "<h3 style='color:red;'>Acceso no permitido.</h3>";
}
?>
