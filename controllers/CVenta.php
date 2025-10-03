<?php
require_once __DIR__ . '/../models/models/MVenta.php';
require_once __DIR__ . '/../session/SesionUsuario.php';
use Sesion\SesionUsuario;

class CVenta {
    public function confirmarCompra($cantidad, $producto) {
        $idUsuario = SesionUsuario::getIdUsuario();
        if (!$idUsuario) {
            return false;
        }
        $fechaVenta = date('Y-m-d');
        $modelo = new MVenta();
        return $modelo->guardarVenta($fechaVenta, $cantidad, $idUsuario, $producto);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $cantidad = isset($input['cantidad']) ? intval($input['cantidad']) : 1;
    $producto = isset($input['producto']) ? $input['producto'] : '';
    $controller = new CVenta(); 
    $success = $controller->confirmarCompra($cantidad, $producto);
    echo json_encode(['success' => $success]);
    exit;
}
?>