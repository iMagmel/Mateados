<?php

require_once __DIR__ . '/ConnectionBD.php';

class MbajaProducto{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function BorrarProducto($idproducto){

        $sql = "EXEC SP_BajaProducto ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$idproducto]); 
        return $stmt;
        
    }
}

?>