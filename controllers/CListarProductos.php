<?php
require_once __DIR__ . '/../models/models/MListarProductos.php';

class CListarProductos{

    public function ObtenerProductos() {
        $get = new MListarProductos();
        return $get->ListadoProductos();
    }
}
?>