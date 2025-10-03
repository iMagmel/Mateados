<?php
require_once __DIR__ . '/../models/models/MAltaProducto.php';

class CAltaProducto{

    private $conn;

    public function __construct() {
        $this->conn = new MAltaProducto();
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $precio = $_POST['precio'] ?? 0;
            $stock = $_POST['stock'] ?? 0;

            $categoria = 1;

            $stmt = $this->conn->AgregarProducto($nombre, $categoria, $precio, $stock);

            if ($stmt) {
                return ['status' => 'success', 'message' => 'Producto agregado correctamente'];
            } else {
                return ['status' => 'error', 'message' => 'Error al guardar el producto'];
            }
        }

        return ['status' => 'error', 'message' => 'Método no permitido'];
    }
}

$controller = new CAltaProducto();
$response = $controller->agregar();

header('Content-Type: application/json');
echo json_encode($response);
