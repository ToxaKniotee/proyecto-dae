<?php
$action = $_GET['action'];
$id = $_GET['id'];
$categoria = $_GET['category'];

include('db_conn.php');
$sql = "UPDATE Actividades SET Estado = $action WHERE Id = $id";
$result = mysqli_query($conn, $sql);
header("Location:home_admin.php#myModal$categoria");
