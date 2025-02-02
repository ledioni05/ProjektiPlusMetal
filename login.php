<?php
session_start();
include_once "User.php";

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        die("⚠️ Të gjitha fushat janë të detyrueshme!");
    }

    if ($user->login($username, $password)) {
        $_SESSION['user_id'] = $user->getUserId($username); 
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $user->getEmail($username); 

        header("Location: profile.php");
        exit();
    } else {
        die("❌ Emri i përdoruesit ose fjalëkalimi është i pasaktë.");
    }
}

if (isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit();
}
?>
