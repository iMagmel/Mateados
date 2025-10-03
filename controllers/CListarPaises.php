<?php
require_once __DIR__ . '/../models/models/MListarPaises.php';

class CListarPaises {
    private $paisModel;

    public function __construct() {
        $this->paisModel = new MaltaPais();
    }

    public function listar() {
        try {
            $paises = $this->paisModel->ListarPaises();
            return ['status' => 'success', 'data' => $paises];
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}

$controller = new CListarPaises();
$response = $controller->listar();

header('Content-Type: application/json');
echo json_encode($response);
