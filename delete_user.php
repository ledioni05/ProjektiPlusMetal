<?php
session_start();
include_once "User.php"; 


if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = intval($_POST['user_id']); 
    $user = new User();
    if ($user->deleteUser($user_id)) {
        header("Location: manage_users.php?success=1");
        exit();
    } else {
        header("Location: manage_users.php?error=1");
        exit();
    }
} else {
    header("Location: manage_users.php");
    exit();
}
?>
