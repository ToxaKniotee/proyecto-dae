<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

/* Hacemos la conexión a la base de datos */
include('db_conn.php');

/* Query de la consulta para traer la nomina, al menos se necesita un dato */
$q = "SELECT Nomina FROM Administradores WHERE Nomina = '$username' AND Password = '$password'";

/* Ejecutamos la consulta */
$result = mysqli_query($conn, $q);

/* Si regreso algun valor, quiere decir que si existe el usuario */
if (mysqli_num_rows($result) > 0) {
    $_SESSION["username"] = $username;
    header("location:home_admin.php");
} else {
    header("location:indexadmin.html?error=true");
}
