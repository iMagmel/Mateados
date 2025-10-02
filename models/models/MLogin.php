<?php
require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MLogin {
    private $conn;

    public function __construct() { 
        $this->conn = ConnectionBD::Connection();
    }

    public function Login($usuario, $password, $email) {
        $sql = "EXEC SP_Login ?, ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$usuario, $password, $email]); 
        return $stmt;
    }
}
?>
