<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$destino = "marketinwied@gmail.com";
$asunto = "Nuevo mensaje desde la página web";

$contenido = "Nombre: $nombre \n";
$contenido .= "Correo: $email \n";
$contenido .= "Mensaje: $mensaje \n";

mail($destino, $asunto, $contenido);

echo "Mensaje enviado correctamente";

?>