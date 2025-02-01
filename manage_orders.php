<?php
session_start();
include_once "order.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

$order = new Order();
$orders = $order->getOrders();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menaxho Porositë</title>
    <link rel="stylesheet" href="manage_orders.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .kthehu, .logout-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        .logout-btn {
            background-color: red;
        }
        .delete-btn {
            background-color: red;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .delete-btn:hover {
            background-color: darkred;
            transform: scale(1.05);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="Dashboard.php" class="kthehu"> Kthehu</a>
        <h1>Menaxho Porositë</h1>
        <a href="logout.php" class="logout-btn"> Dil</a>
    </nav>

    <div class="container">
        <h2>Lista e Porosive</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Adresa</th>
                    <th>Komente</th>
                    <th>Imazhi</th>
                    <th>Produkti</th>
                    <th>Çmimi</th>
                    <th>Sasia</th>
                    <th>Totali</th>
                    <th>Veprim</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($orders)) {
                    foreach ($orders as $row) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["Emri"]) . "</td>
                                <td>" . htmlspecialchars($row["Mbiemri"]) . "</td>
                                <td>" . htmlspecialchars($row["Telefoni"]) . "</td>
                                <td>" . htmlspecialchars($row["Adresa"]) . "</td>
                                <td>" . htmlspecialchars($row["Komente"]) . "</td>
                                <td><img src='" . htmlspecialchars($row["Imazhi"]) . "' alt='Produkti' width='50'></td>
                                <td>" . htmlspecialchars($row["Produkti"]) . "</td>
                                <td>" . htmlspecialchars($row["Çmimi"]) . "€</td>
                                <td>" . htmlspecialchars($row["Sasia"]) . "</td>
                                <td>" . htmlspecialchars($row["Totali"]) . "€</td>
                                <td>
                                   <form action='delete_order.php' method='POST' onsubmit='return confirm(\"A jeni i sigurt që dëshironi të fshini këtë porosi?\");'>
                                        <input type='hidden' name='order_id' value='" . htmlspecialchars($row["id"]) . "'>
                                        <button type='submit' class='delete-btn'>❌ Fshije</button>
                                    </form>
                                </td>
                              </tr>"; 
                    }
                } else {
                    echo "<tr><td colspan='12'>Nuk ka porosi të regjistruara.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>