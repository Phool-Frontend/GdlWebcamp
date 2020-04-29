<?php

require 'paypal/autoload.php';
// Este es donde nos rediriguira cuando Paguemos en Paypay, esta en localhost 
//define('URL_SITIO','http://localhost/proyecto-produccion');

define('URL_SITIO','https://gdwebcamp.herokuapp.com/');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ARi3VfElwWBi86Em-_QhmiLZh90lRkXPzAJckhNjeab0EfUhdf7Uvh4bjJ2AnvKkuumxIfsKR5Zwayp_',//Cliente
        'EOWGJBUMbRRTmgWiht4JQdyPSzDfCn_JbUUvAmo0HmF3KFK6W1Jx8FtgkGpj4ZAKOcQJQvcdDpp1ecCq'//Secret
    )
);



?>
