<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];

if ($username == "A00123456" && $password == "A00123456") {
    $_SESSION["username"] = $username;
    header("location:home.php");
} else {
    header("location:index.html?error=true");
}
