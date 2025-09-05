<?php
require_once __DIR__ . '/../Connection/ConnectionBD.php';

class DatosAuxiliares {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function obtenerGeneros() {
        $sql = "SELECT DISTINCT Id_Genero, Genero FROM Genero ORDER BY Genero";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerUbicaciones() {
        $sql = "EXEC SP_ObtenerUbicacion";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function usuarioExiste($usuario) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM Usuarios WHERE Usuario = ?");
        $stmt->execute([$usuario]);
        return $stmt->fetchColumn() > 0;
    }

}

?>