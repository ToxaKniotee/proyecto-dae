<?php

/* Nos conectamos a la base de datos */
include('db_conn.php');

/* Recuperamos los valores POST */
$observaciones = $_POST['observaciones'];
$id = $_POST['id'];

/* Creamos la sentencia para modificar los comentarios de esa actividad */
$stmt = $conn->prepare("UPDATE Actividades SET Observaciones = ? WHERE Id = ?");
$stmt->bind_param('si', $observaciones, $id);

/* Ejecutamos y recargamos la página */
$stmt->execute();
header('Location:home_admin.php');
