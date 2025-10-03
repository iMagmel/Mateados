<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../models/models/MbajaCliente.php';

class CBajaCliente {
    private $modelo;

    public function __construct() {
        $this->modelo = new MbajaCliente();
    }

    public function eliminarCliente() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
            exit;
        }

        $idcliente = $_POST['idcliente'] ?? 0;
        if (!$idcliente) {
            echo json_encode(['status' => 'error', 'message' => 'ID de cliente no válido']);
            exit;
        }

        try {
            $resultado = $this->modelo->BorrarCliente($idcliente);
            if ($resultado) {
                echo json_encode(['status' => 'success', 'message' => 'Cliente eliminado correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar el cliente']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

$controller = new CBajaCliente();
$controller->eliminarCliente();
