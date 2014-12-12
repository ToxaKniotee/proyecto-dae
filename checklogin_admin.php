<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

/* Hacemos la conexión a la base de datos */
include('db_conn.php');

/* Query de la consulta para traer la nomina, al menos se necesita un dato */
$q = "SELECT Nomina FROM Administradores WHERE Nomina = '$username' AND Password = '$password'";

/* Ejecutamos la consulta */
$result = $conn->query($q);

/* Si regreso algun valor, quiere decir que si existe el usuario */
if ($result->num_rows > 0) {
    $_SESSION["username"] = $username;
    header("location:home_admin.php");
} else {
    header("location:indexadmin.html?error=true");
}
