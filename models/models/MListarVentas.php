<?php

require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MListarVentas {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function ListadoVentas() {
        try {
            $sql = "EXEC SP_ListarVentas";
            $stmt = $this->conn->prepare($sql);

            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                throw new Exception("Error al ejecutar SP_ListarVentas");
            }
        } catch (Exception $e) {
            error_log("Error en el listado de ventas: " . $e->getMessage());
            return [];
        }
    }
}
?>
