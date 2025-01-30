<?php
$servername = "localhost";
$dbname = "DESKTOP-9G4CNLD"; 


$conn = new mysqli($servername, "", "", $dbname);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = "user"; 

    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Regjistrimi u krye me sukses! <a href='index.html'>Kyçu këtu</a>";
    } else {
        echo "Gabim: " . $conn->error;
    }
}

$conn->close();
?>
