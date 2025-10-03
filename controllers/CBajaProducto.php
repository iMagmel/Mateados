<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../models/models/MBajaProducto.php';

class CBajaProducto {
    private $modelo;

    public function __construct() {
        $this->modelo = new MBajaProducto();
    }

    public function eliminarProducto() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
            exit;
        }

        $idProducto = $_POST['idProducto'] ?? 0;
        if (!$idProducto) {
            echo json_encode(['status' => 'error', 'message' => 'ID de producto no válido']);
            exit;
        }

        try {
            $resultado = $this->modelo->BorrarProducto($idProducto);
            if ($resultado) {
                echo json_encode(['status' => 'success', 'message' => 'Producto eliminado correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar el producto']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

$controller = new CBajaProducto();
$controller->eliminarProducto();
