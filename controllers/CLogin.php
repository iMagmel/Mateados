<?php
require_once __DIR__ . '/../models/models/MLogin.php';
require_once __DIR__ . '/../helpers/Encriptacion.php';
require_once __DIR__ . '/../session/SesionUsuario.php'; 
use Sesion\SesionUsuario;

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
        $stmt = $modelo->Login($usuario, $clave_hash, $email);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
 
            SesionUsuario::iniciarSesion(
                $result['Id_Usuario'],
                $result['Nombre'],
                $result['NUsuario'],
                $result['Id_Rol']
            );

            if (SesionUsuario::getIdRol() == 1) {
                header("Location: /Mateados/views/Admin/index.html");
                exit();
            } else {
                header("Location: /Mateados/views/pagprincipal/index.php");
                exit();
            }
        } else {
            return "Usuario y contraseña incorrectos.";
        }
    }
}
