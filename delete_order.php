<?php
session_start();
include_once "Database.php";
include_once "order.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order_id"])) {
    $order = new Order();
    $order_id = intval($_POST["order_id"]); 

    if ($order->deleteOrder($order_id)) {
        header("Location: manage_orders.php?success=1");
        exit();
    } else {
        header("Location: manage_orders.php?error=1");
        exit();
    }
} else {
    header("Location: manage_orders.php");
    exit();
}
?>
