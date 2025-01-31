<?php
session_start();
include_once "User.php"; 


if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}


$user = new User();
$users = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menaxho Përdoruesit</title>
    <link rel="stylesheet" href="manage_users.css"> 
</head>
<body>
    <nav class="navbar">
        <a href="Dashboard.php" class="kthehu"> Kthehu</a>
        <h1>Menaxho Përdoruesit</h1>
        <a href="logout.php" class="logout-btn"> Dil</a>
    </nav>

    <div class="container">
        <h2>Lista e Përdoruesve</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Roli</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($users)) {
                    foreach ($users as $row) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["username"]) . "</td>
                                <td>" . htmlspecialchars($row["email"]) . "</td>
                                <td>" . ucfirst(htmlspecialchars($row["role"])) . "</td>

                                <td>
                                    <form action='delete_user.php' method='POST' onsubmit='return confirm(\"A jeni i sigurt që dëshironi të fshini këtë përdorues?\");'>
                                        <input type='hidden' name='user_id' value='" . htmlspecialchars($row["id"]) . "'>
                                        <button type='submit' class='delete-btn'>🗑️ Fshije</button>
                                    </form>
                                </td>

                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nuk ka përdorues të regjistruar.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>



<style>
    .container {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background-color: #007bff;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.kthehu {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
}

.logout-btn {
    background-color: red;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
}
</style>