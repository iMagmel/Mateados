<?php
require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MaltaPais {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function ListarPaises() {
        $sql = "EXEC SP_ListarPaises";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
