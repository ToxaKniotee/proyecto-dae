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

/* Obtenemos los valores */
$categoria = $_POST['categoria'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$rol = $_POST['rol'];
$periodo = $_POST['periodo'];
$impacto = $_POST['impacto'];
$aprendizaje = $_POST['aprendizaje'];
$competencias = $_POST['competencias'];
$alumno = $_POST['alumno'];

/* Creamos la sentencia de inserción */
$q = "INSERT INTO Actividades (Estado, Nombre, Descripcion, Alumno, Categoria, Tipo, Rol, Periodo, AreaImpacto,
    Aprendizajes, Competencias) VALUES ('0', '$nombre', '$descripcion', '$alumno', '$categoria', '$tipo', '$rol',
    '$periodo', '$impacto', '$aprendizaje', '$competencias')";

print("Sentencia SQL: $q <br>");

/* Ejecutamos la sentencia */
if (mysqli_query($conn, $q)) {
    echo 'Se Inserto la tabla';
} else {
    echo 'Error: ' . mysqli_error($conn);
}
