<?php
require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MListarClientes{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function ListarClientes() {
        $sql = "EXEC SP_ListarClientes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
