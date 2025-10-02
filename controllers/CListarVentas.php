<?php
require_once __DIR__ . '/../models/models/MListarVentas.php';

class CListarVentas {

    public function ObtenerVentas() {
        $ventas = new MListarVentas();
        return $ventas->ListadoVentas();
    }
}
?>
