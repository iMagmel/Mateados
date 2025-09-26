<?php
class Encriptar{
    public static function SHA256($clave) {
        return hash("sha256", $clave);
    }
}
?>