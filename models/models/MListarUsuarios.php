<?php

require_once __DIR__ . '/../Connection/ConnectionBD.php';

class MListarUsuarios{
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function ListadoUsuarios(){
        try {
            $sql = "EXEC SP_ListarUsuarios";
            $stmt = $this->conn->prepare($sql);
            
            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                throw new Exception("Error al ejecutar la consulta");
            }
        } catch (Exception $e) {
            error_log("Error en el listado de usuarios: " . $e->getMessage());
            return [];
        }
    }
}

?>