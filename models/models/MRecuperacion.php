<?php
require_once __DIR__ . '/ConnectionBD.php';

class M_Recuperacion {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionBD::Connection();
    }

    public function verificarEmail($email) {
        $sql = "EXEC SP_VerificarEmail ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        public function guardarCodigo($email, $codigo) {
        $sql = "EXEC SP_GuardarCodRecuperacion ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $codigo]);
    }
        public function verificarCodigo($email, $codigo) {
        $sql = "EXEC SP_VerificarCodRecuperacion ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        public function cambiarContraseña($email, $nueva_contraseña) {
        $sql = "EXEC SP_CambiarContraseña ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $nueva_contraseña]); 
    }

    }
?>