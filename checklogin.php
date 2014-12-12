<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

/* Hacemos la conexión con la base de datos */
include('db_conn.php');

/* Query de la consulta para traer la matricula */
$stmt = $conn->prepare("SELECT Matricula FROM Alumnos WHERE Matricula = ? AND Password = ?");
$stmt->bind_param('ss', $username, $password);
$stmt->execute();

/* Obtenemos los resultados */
$result = $stmt->get_result();

/* Si regreso algun valor, quiere decir que si existe el usuario */
if ($result->num_rows > 0) {
    $_SESSION["username"] = $username;
    header("location:home.php");
} else {
    header("location:index.html?error=true");
}
