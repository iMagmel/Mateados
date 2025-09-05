<?php

require_once __DIR__ . "/../Connection/ConnectionBD.php";
require_once __DIR__ . "/../../helpers/Encriptacion.php";

class MSignUp{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectionBD::Connection();
    }

    public function Registro($nombre, $apellido, $documento, $id_genero, $fecha_recibida,$id_localidad, $email,
     $usuario, $contrasena, $id_rol) {
        try {

            $sqlPais = "EXEC SP_ObtenerLocalidad ?";
            $stmtPais = $this->conn->prepare($sqlPais);
            $stmtPais->execute([$id_localidad]);
            $rowPais = $stmtPais->fetch(PDO::FETCH_ASSOC);

            if (!$rowPais || !isset($rowPais['Id_Pais'])) {
                return "Error: No se pudo obtener el país desde la localidad.";
            }

            $id_pais = $rowPais['Id_Pais'];

            
            $encriptacion = new Encriptar();
            $password_hash = $encriptacion->SHA256($usuario, $contrasena);

            $sql = "EXEC SP_RegistroUsuario ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @registrado OUTPUT";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $nombre,
                $apellido,
                $documento,
                $id_genero,
                $fecha_recibida,
                $email,
                $usuario,
                $password_hash,
                $id_rol,
                $id_pais
            ]);

            $stmt->nextRowset();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return "Error al registrar usuario: " . $e->getMessage();
        }
    }
}

?>