<?php
include_once "User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password)) {
        die("Të gjitha fushat janë të detyrueshme!");
    }

    if ($user->register($username, $email, $password)) {
        echo "Regjistrimi u krye me sukses! <a href='login.html'>Kyçu këtu</a>";
    } else {
        echo "Gabim gjatë regjistrimit!";
    }
}
?>
