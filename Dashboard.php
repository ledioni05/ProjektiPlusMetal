
<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.html");
    exit();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="kthehu">Kthehu</a>
        <h1>Admin Dashboard</h1>
        <a href="logout.php" class="logout-btn">Log Out</a>
        
    </nav>
    
    <div class="container">
        <h2>Mirësevini, Admin!</h2>
        <p>Kjo është faqja e panelit të administrimit.</p>
        
        <div class="cards">
            <div class="card">
                <h3>Përdoruesit</h3>
                <p>Menaxho përdoruesit e regjistruar.</p>
                <a href="manage_users.php" class="btn">Shiko</a>
            </div>

            <div class="card">
                <h3>Raportet</h3>
                <p>Shiko dhe analizo raportet.</p>
                <a href="manage_orders.php" class="btn">Shiko</a>
            </div>

        </div>
    </div>
</body>
</html>

<style>
.navbar {
    background-color: #222; 
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
}


.navbar a {
    text-decoration: none;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s ease, transform 0.2s ease;
}


.kthehu {
    background-color: #007bff; 
    margin-right: auto; 
}

.kthehu:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}


.navbar h1 {
    margin: 0;
    font-size: 22px;
    text-align: center;
    flex-grow: 1; 
    display: flex;
    justify-content: center;
}


.logout-btn {
    background-color: #dc3545; 
    margin-left: auto; 
}

.logout-btn:hover {
    background-color: #b02a37;
    transform: scale(1.05);
}

.container {
    max-width: 900px;
    margin: 30px auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.cards {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.card {
    background: #fff;
    padding: 20px;
    width: 30%;
    border-radius: 8px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.card h3 {
    margin-bottom: 10px;
}

.btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}

</style>