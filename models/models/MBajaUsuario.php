<?php
require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MBajaUsuario {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function BorrarUsuario($idusuario) {
        $sql = "EXEC SP_BajaUsuario ?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$idusuario]);
    }
}
?>
