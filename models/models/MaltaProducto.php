<?php

require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MAltaProducto{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function AgregarProducto($nombre, $categoria, $precio, $stock){
    $sql = "EXEC SP_AltaProducto ?, ?, ?, ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$nombre, $categoria, $precio, $stock]); 
    return $stmt;
    }
}

?>