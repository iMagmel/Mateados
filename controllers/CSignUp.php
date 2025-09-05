
<?php

require_once __DIR__ . "/../models/models/MSignUp.php";

class CSignUp {

    public function RegistrarUsuario(
                $nombre,
                $apellido,
                $documento,
                $id_genero,
                $fecha_recibida,
                $email,
                $usuario,
                $password_hash,
                $id_rol,
                $id_pais,
                $registrado
    ) {
        $modelo = new MSignUp(); 

        $result = $modelo->Registro(
                $nombre,
                $apellido,
                $documento,
                $id_genero,
                $fecha_recibida,
                $email,
                $usuario,
                $password_hash,
                $id_rol,
                $id_pais,
                $registrado
                    );

        return $result;
    }
}