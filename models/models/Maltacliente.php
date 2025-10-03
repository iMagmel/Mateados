<?php

require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MAltaCliente{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function AgregarCliente($nombre, $apellido, $dni, $fnacimiento){

        $sql = "EXEC SP_AltaCliente ?, ?, ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nombre, $apellido, $dni, $fnacimiento]); 
        return $stmt;
        
    }
}

?>