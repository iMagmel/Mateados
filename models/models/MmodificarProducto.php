<?php

require_once __DIR__ . '/ConnectionBD.php';

class MaltaProducto{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function ModificarProducto($nombre, $categoria, $precio){

        $sql = "EXEC SP_ModificarProducto ?, ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $categoria, $precio]); 
        return $stmt;
        
    }
}

?>