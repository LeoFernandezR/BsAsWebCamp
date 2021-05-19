<?php
require 'paypal/autoload.php';
define('URL_SITIO', 'http://localhost/Proyecto%20GDLWEBCAMP/');
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AcKgGu0t_3eS1gbEQ8qAdj58COQiIH5yF35qOQ4B3DijU7s8h8Sct-Hng6IxPMOYyY5Twt-9CS3_gQ7G',     // ClientID
            'EI_KIXQcaaw4kOIroUTmVQ1XmPhwGhwBbjZgFDBecsXMNKQKtXVGrjxC0VfuZtK3bEGsLe2YgUNxXWz_'      // ClientSecret
    )
);
