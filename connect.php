<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "login"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}
?>
