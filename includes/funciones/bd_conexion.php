<?php

define('DB_USUARIO', 'JRiV7EjuTM');
define('DB_PASSWORD', 'OXixcRCG1Y');
define('DB_HOST', 'remotemysql.com');
define('DB_NOMBRE', 'JRiV7EjuTM');

$conn = new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE, 3306);
$conn->set_charset('utf8');
if ($conn->connect_error) {
    echo $error->$conn->connect_error;
}
