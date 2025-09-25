<?php

require_once __DIR__ . '/ConnectionBD.php';

class MaltaProducto{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function ModificarCliente($nombre, $apellido, $dni, $idpais, $idgenero, $fnacimiento){

        $sql = "EXEC SP_ModificarCliente ?, ?, ?, ?, ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $apellido, $dni, $idpais, $idgenero, $fnacimiento]); 
        return $stmt;
        
    }
}

?>