<?php
class Database {
    private $host = "localhost"; 
    private $db_name = "login"; 
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                  $this->username, 
                                  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Gabim në lidhjen me databazën: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
