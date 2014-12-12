<?php

/* Conexión con la base de datos */
include('db_conn.php');

/* Iniciamos la sesión */
session_start();

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
$alumno = $_SESSION['username'];

/* Creamos la sentencia de inserción */
$q = "INSERT INTO Actividades (Estado, Nombre, Descripcion, Alumno, Categoria, Tipo, Rol, Periodo, AreaImpacto,
    Aprendizajes, Competencias) VALUES ('0', '$nombre', '$descripcion', '$alumno', '$categoria', '$tipo', '$rol',
    '$periodo', '$impacto', '$aprendizaje', '$competencias')";

print("Sentencia SQL: $q <br>");

/* Ejecutamos la sentencia */
if ($conn->query($q)) {
    header('Location:home.php');
} else {
    echo 'Error: ';
}
