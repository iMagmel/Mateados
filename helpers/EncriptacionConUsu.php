<?php
class Encriptar{
    public static function SHA256($usuario, $contraseña) {
        $clave = $usuario . $contraseña;
        return hash("sha256", $clave);
    }
}
?>