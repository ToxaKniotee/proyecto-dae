<?php

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'DAEITESMCCV';

/* Nos conectamos a la base de datos */
$conn = mysqli_connect($server, $username, $password, $dbname);

/* Checamos que la conexión fue correcta */
if (!$conn) {
    die('Fallo la conexión: ' . mysqli_connect_error());
}
