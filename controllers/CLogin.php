<?php
require_once __DIR__ . '/../models/models/Mlogin.php';
require_once __DIR__ . '/../helpers/Encriptacion.php';

class CLogin {
    public function VerifyLog($usuario, $password, $email) {

        if (empty($usuario) || empty($password) || empty($email)) {
            return "Todos los campos son obligatorios.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "El formato del email no es válido.";
        }

        $clave_hash = Encriptar::SHA256($password); 

        $modelo = new MLogin();
        $stmt = $modelo->login($usuario, $clave_hash, $email);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            session_start();
            $_SESSION["Id_Usuario"] = $result["Id_Usuario"];
            $_SESSION["nombre"] = $result["Nombre"]; 
            $_SESSION["usuario"] = $result["Usuario"];
            $_SESSION["Id_Rol"] = $result["Id_Rol"];

            if ($_SESSION["Id_Rol"] == 1) {
                header("Location: /Mateados/views/Admin/index.html");
                exit();
            } else if ($_SESSION["Id_Rol"] == 2) {
                header("Location: /Mateados/views/pagprincipal/index.php");
                exit();
            }
        } else {
            return "Usuario y contraseña incorrectos.";
        }
    }
}
?>
