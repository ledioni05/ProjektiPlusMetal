<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        die("Të gjitha fushat janë të detyrueshme!");
    }

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    if (!$stmt) {
        die("Gabim në SQL (LOGIN): " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($role == "admin") {
                header("Location: Dashboard.php");
            } else {
                header("Location: index.html");
            }
            exit();
        } else {
            die("Fjalëkalimi është i pasaktë.");
        }
    } else {
        die("Përdoruesi nuk ekziston.");
    }

    $stmt->close();
    $conn->close();
}
?>
