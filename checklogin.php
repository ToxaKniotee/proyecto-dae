<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

/* Hacemos la conexión con la base de datos */
include('db_conn.php');

/* Query de la consulta para traer la matricula */
$q = "SELECT Matricula FROM Alumnos WHERE Matricula = '$username' AND Password = '$password'";

/* Ejecutamos la consulta */
$result = $conn->query($q);

/* Si regreso algun valor, quiere decir que si existe el usuario */
if ($result->num_rows > 0) {
    $_SESSION["username"] = $username;
    header("location:home.php");
} else {
    header("location:index.html?error=true");
}
