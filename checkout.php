<?php
session_start();
include_once "Database.php";
include_once "order.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$user_role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user';

echo "Përdoruesi i kyçur: " . htmlspecialchars($username);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    
    $emri = isset($_POST['emri']) ? trim($_POST['emri']) : null;
    $mbiemri = isset($_POST['mbiemri']) ? trim($_POST['mbiemri']) : null;
    $telefoni = isset($_POST['telefoni']) ? trim($_POST['telefoni']) : null;
    $adresa = isset($_POST['adresa']) ? trim($_POST['adresa']) : null;
    $komente = isset($_POST['komente']) ? trim($_POST['komente']) : null;
    $products = isset($_POST['products']) ? json_decode($_POST['products'], true) : [];
    $total_price = isset($_POST['total_price']) ? floatval($_POST['total_price']) : null;

    if (!$emri || !$mbiemri || !$telefoni || !$adresa || empty($products)) {
        die("⚠️ Gabim: Ju lutemi plotësoni të gjitha fushat dhe sigurohuni që shporta nuk është bosh!");
    }

    $order = new Order();
    $orderSuccess = true; 
   
    foreach ($products as $product) {
        if (!isset($product['image'], $product['name'], $product['price'], $product['quantity'])) {
            die("⚠️ Gabim: Produkti nuk ka të dhëna të plota!");
        }

        $product_image = htmlspecialchars($product['image']);
        $product_name = htmlspecialchars($product['name']);
        $product_price = floatval($product['price']);
        $product_quantity = intval($product['quantity']);
        $product_total = floatval($product_price * $product_quantity);

        $orderPlaced = $order->placeOrder(
            $emri, 
            $mbiemri, 
            $telefoni, 
            $adresa, 
            $komente, 
            $product_image, 
            $product_name, 
            $product_price, 
            $product_quantity, 
            $product_total
        );

        if (!$orderPlaced) {
            $orderSuccess = false;
        }
    }
    if ($orderSuccess) {
        if ($user_role == 'admin') {
            echo "<script>alert('✅ Porosia u ruajt me sukses!'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('✅ Porosia u ruajt me sukses!'); window.location.href='index.php';</script>";
        }
        exit();
    } else {
        die("⚠️ Gabim gjatë ruajtjes së porosisë!");
    }
}
?>
