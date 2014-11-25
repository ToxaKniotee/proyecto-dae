<?php

/* Nos conectamos a la base de datos */
include('db_conn.php');

/* Recuperamos los valores POST */
$observaciones = $_POST['observaciones'];
$id = $_POST['id'];

/* Creamos la sentencia para modificar los comentarios de esa actividad */
$sql = "UPDATE Actividades SET Observaciones = '$observaciones' WHERE Id = $id";

/* Ejecutamos y recargamos la página */
$result = mysqli_query($conn, $sql);
header('Location:home_admin.php');
