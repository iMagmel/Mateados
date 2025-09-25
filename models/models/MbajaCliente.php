<?php

require_once __DIR__ . '/ConnectionBD.php';

class MaltaProducto{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function BajaCliente($id_cliente){

        $sql = "EXEC SP_BajaCliente ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_cliente]); 
        return $stmt;
        
    }
}

?>