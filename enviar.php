<?php

function validar_campo($campo)
{
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
}

if(isset($_POST["contactName"]) && !empty($_POST["contactName"]) &&
    isset($_POST["contactEmail"]) && !empty($_POST["contactEmail"]) &&
    isset($_POST["contactSubject"]) && !empty($_POST["contactSubject"]) &&
    isset($_POST["contactMessage"]) && !empty($_POST["contactMessage"])){

    $destinoMail = "crgonzalezvi@gmail.com";
    $contactName = validar_campo($_POST["contactName"]);
    $contactEmail = validar_campo($_POST["contactEmail"]);
    $contactSubject = validar_campo($_POST["contactSubject"]);
    $contactMessage = validar_campo($_POST["contactMessage"]);

    $contenido = "Nombre: ".$contactName."\n Email: ".$contactEmail."\n Asunto: ".$contactSubject."\n Mensaje: ".$contactMessage;


    mail($destinoMail,"Mensaje de contacto del cliente".$contactName, $contenido);

    return print(json_encode('ok'));


}

return print(json_encode('no'));
