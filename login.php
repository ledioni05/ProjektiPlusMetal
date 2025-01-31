<?php
session_start();
include_once "User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        die("Të gjitha fushat janë të detyrueshme!");
    }

    if ($user->login($username, $password)) {
      
        header("Location: index.php");
        exit();
    } else {
        die("Emri i përdoruesit ose fjalëkalimi është i pasaktë.");
    }
}
?>
