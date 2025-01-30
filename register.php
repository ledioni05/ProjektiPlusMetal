<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email) || empty($password)) {
        die("Të gjitha fushat janë të detyrueshme!");
    }

    $checkTable = $conn->query("SHOW TABLES LIKE 'users'");
    if ($checkTable->num_rows == 0) {
        die("Gabim: Tabela 'users' nuk ekziston në databazë.");
    }

   
    $checkUser = $conn->prepare("SELECT id FROM users WHERE username = ?");
    if (!$checkUser) {
        die("Gabim në SQL (SELECT): " . $conn->error);
    }

    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        die("Përdoruesi tashmë ekziston!");
    }
    $checkUser->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = "user";

    
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Gabim në SQL (INSERT): " . $conn->error);
    }

    $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Regjistrimi u krye me sukses! <a href='login.html'>Kyçu këtu</a>";
    } else {
        echo "Gabim gjatë regjistrimit: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
