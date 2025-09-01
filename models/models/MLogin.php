<?php
require_once __DIR__ . '/ConnectionBD.php';

class MLogin {
    private $conn;

    public function __consruct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function Login($usuario, $password, $email) {
        $sql = "EXEC SP_Login ?, ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $usuario, $password]); 
        return $stmt;
    }
}
?>