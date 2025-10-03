<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../models/models/MBajaUsuario.php';

class CBajaUsuario {
    private $modelo;

    public function __construct() {
        $this->modelo = new MBajaUsuario();
    }

    public function eliminarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
            exit;
        }

        $idUsuario = $_POST['idusuario'] ?? 0;
        if (!$idUsuario) {
            echo json_encode(['status' => 'error', 'message' => 'ID de usuario no válido']);
            exit;
        }

        try {
            $resultado = $this->modelo->BorrarUsuario($idUsuario);
            if ($resultado) {
                echo json_encode(['status' => 'success', 'message' => 'Usuario eliminado correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar el usuario']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

$controller = new CBajaUsuario();
$controller->eliminarUsuario();
