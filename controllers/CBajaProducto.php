<?php
require_once __DIR__ . '/../models/models/MBajaProducto.php';

class CBajaProducto {
    public function Eliminar($idProducto) {
        $baja = new MBajaProducto();
        return $baja->BorrarProducto($idProducto);
    }
}
?>
