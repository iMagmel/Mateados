<?php

require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MVenta {
    private $conn;

    public function __construct() { 
        $this->conn = ConnectionBD::Connection();
    }

public function guardarVenta($fechaVenta, $cantidad, $idUsuario, $producto) {
    $sql = "EXEC sp_insertar_venta ?, ?, ?, ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$fechaVenta, $cantidad, $idUsuario, $producto]);
    return $stmt;
}
}
?>