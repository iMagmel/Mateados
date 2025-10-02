
<?php

require_once __DIR__ . "/../models/models/MSignUp.php";

class CSignUp {

    public function RegistrarUsuario(
                $nombre,
                $apellido,
                $documento,
                $fecha_recibida,
                $email,
                $usuario,
                $password_hash,
                $id_rol,
    ) {
        $modelo = new MSignUp(); 

        $result = $modelo->Registro(
                $nombre,
                $apellido,
                $documento,
                $fecha_recibida,
                $email,
                $usuario,
                $password_hash,
                $id_rol
                    );

        return $result;
    }
}