<?php
require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MBajaProducto {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function BorrarProducto($idProducto) {
        $sql = "EXEC SP_bajaProducto ?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$idProducto]);
    }
}
?>
