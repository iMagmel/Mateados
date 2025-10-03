<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../models/models/MAltaCliente.php';

class CAltaCliente {
    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new MAltaCliente();
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return ['status' => 'error', 'message' => 'Método no permitido'];
        }

        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $dni = $_POST['dni'] ?? '';
        $fnacimiento = $_POST['fnacimiento'] ?? '';

        if(!$nombre || !$apellido || !$dni || !$fnacimiento) {
            return ['status' => 'error', 'message' => 'Faltan datos'];
        }

        try {
            $this->clienteModel->AgregarCliente($nombre, $apellido, $dni, $fnacimiento);
            return ['status' => 'success', 'message' => 'Cliente agregado correctamente'];
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => 'Error: '.$e->getMessage()];
        }
    }
}

$controller = new CAltaCliente();
echo json_encode($controller->agregar());
?>
