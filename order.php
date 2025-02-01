<?php
include_once "Database.php";

class Order {
    private $conn;
    private $table_name = "produktet";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function placeOrder($imazhi, $produkti, $cmimi, $sasia, $totali) {
        $query = "INSERT INTO " . $this->table_name . " (Imazhi, Produkti, Çmimi, Sasia, Totali) 
                  VALUES (:imazhi, :produkti, :cmimi, :sasia, :totali)";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":imazhi", $imazhi, PDO::PARAM_STR);
        $stmt->bindParam(":produkti", $produkti, PDO::PARAM_STR);
        $stmt->bindParam(":cmimi", $cmimi, PDO::PARAM_STR);
        $stmt->bindParam(":sasia", $sasia, PDO::PARAM_INT);
        $stmt->bindParam(":totali", $totali, PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    
    public function getOrders() {
        $query = "SELECT id, Imazhi, Produkti, Çmimi, Sasia, Totali FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOrderById($order_id) {
        $query = "SELECT id, Imazhi, Produkti, Çmimi, Sasia, Totali FROM " . $this->table_name . " WHERE id = :order_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteOrder($order_id) {
        $query = "DELETE FROM produktet WHERE id = :order_id LIMIT 1";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":order_id", $order_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
}
?>
