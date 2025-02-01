<?php
session_start();
include_once "Database.php";
include_once "order.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $products = json_decode($_POST['products'], true); 
    
    $order = new Order();
    
    foreach ($products as $product) {
        $product_image = $product['image'];
        $product_name = $product['name'];
        $product_price = $product['price'];
        $product_quantity = $product['quantity'];
        $product_total = $product_price * $product_quantity;

       
        $orderPlaced = $order->placeOrder($product_image, $product_name, $product_price, $product_quantity, $product_total);

        if (!$orderPlaced) {
            die("Gabim gjatë ruajtjes së porosisë!");
        }
    }

    echo "<script>alert('Porosia u ruajt me sukses!'); window.location.href='manage_orders.php';</script>";
    exit();
}

?>
