<?php

$db_server = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'DAEITESMCCV';

/* Nos conectamos a la base de datos */
$conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

/* Checamos que la conexión fue correcta */
if (!$conn) {
    die('Fallo la conexión: ' . mysqli_connect_error());
}
