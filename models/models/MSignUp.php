<?php

require_once __DIR__ . "/../Connection/ConnectionBD.php";
require_once __DIR__ . "/../../helpers/Encriptacion.php";

class MSignUp{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectionBD::Connection();
    }

    public function Registro($nombre, $apellido, $documento, $fecha_recibida, $email,
    $usuario, $contrasena, $id_rol) {
        try {
            $encriptacion = new Encriptar();
            $password_hash = $encriptacion->SHA256($usuario, $contrasena);

            $sql = "EXEC SP_RegistroUsuario ?, ?, ?, ?, ?, ?, ?, ?, @registrado OUTPUT";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $nombre,
                $apellido,
                $documento,
                $fecha_recibida,
                $email,
                $usuario,
                $password_hash,
                $id_rol
            ]);

            $stmt->nextRowset();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;

        } catch (PDOException $e) {
            return "Error al registrar usuario: " . $e->getMessage();
        }
    }

}

?>