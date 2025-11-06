<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$database = '013_online_shop';

/* $host = 'remotehost.es';
$user = 'dwess1234';
$pwd = 'Usertest1234.';
$database   = 'dwesdatabase'; */

$conn = new mysqli($host, $user, $pwd, $database, 3307);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');
?>;