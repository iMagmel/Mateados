<?php
require_once __DIR__ . '/../models/models/MListarClientes.php';

class CListarClientes {
    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new MListarClientes();
    }

    public function ObtenerClientes() {
        try {
            return $this->clienteModel->ListarClientes();
        } catch (Exception $e) {
            return [];
        }
    }
}
?>
