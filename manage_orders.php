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
                    echo "<tr><td colspan='7'>Nuk ka porosi të regjistruara.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
