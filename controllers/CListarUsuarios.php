<?php
require_once __DIR__ . '/../models/models/MListarUsuarios.php';

class CListarUsuarios{

    public function ObtenerUsuarios() {
        $get = new MListarUsuarios();
        return $get->ListadoUsuarios();
    }
}
?>