<?php

require 'paypal/autoload.php';
// Este es donde nos rediriguira cuando Paguemos en Paypay, esta en localhost 
//define('URL_SITIO','http://localhost/proyecto-produccion');

define('URL_SITIO','https://gdwebcamp.herokuapp.com');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ATeYyX9QootgJThVhSETUGp-0zGVm9ZLuk9U6vqW8IYapjPInfSjg9tU2ZBKm-MuBMuu9QbDJ8C3VRTb',//Cliente
        'EJaPsDHJrHiiqacuYAauhtbUIQrYR2pY5ZDvKTK1EyRxmLlWpwRiKOCdXBokjH1keHuA5pMPwKRH-7dA'//Secret
    )
);



?>
