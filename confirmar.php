<?php
$action = $_GET['action'];
$id = $_GET['id'];
$categoria = $_GET['category'];

include('db_conn.php');

$stmt = $conn->prepare("UPDATE Actividades SET Estado = ? WHERE Id = ?");
$stmt->bind_param('ii', $action, $id);
$stmt->execute();

header("Location:home_admin.php#myModal$categoria");
