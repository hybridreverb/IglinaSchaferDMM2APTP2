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
        echo "<script>alert('El correo se envio correctamente');</script>";
    }else{
        echo "<script>alert('El correo no se envio');</script>";
    }
}
?>
