<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

if ($username == "A00123456" && $password == "A00123456") {
    $_SESSION["username"] = $username;
    header("location:home_admin.html");

} else {
    header("location:indexadmin.html?error=true");
}
