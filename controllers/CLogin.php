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
    echo "
    <style>
        #custom-alert {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(59, 80, 59, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
        #custom-alert-box {
            background: #fff;
            border-radius: 16px;
            padding: 32px 24px;
            box-shadow: 0 4px 24px rgba(91,117,83,0.18);
            text-align: center;
            font-family: 'Roboto', sans-serif;
            min-width: 300px;
            border: 2px solid #c5d6b0;
        }
        #custom-alert-title {
            color: #5b7553;
            font-size: 1.5rem;
            margin-bottom: 8px;
            font-weight: 700;
            border-bottom: 2px solid #ffdd57;
            display: inline-block;
            padding-bottom: 4px;
        }
        #custom-alert-btn {
            margin-top: 18px;
            background: #5b7553;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s;
        }
        #custom-alert-btn:hover {
            background: #3e503b;
        }
    </style>
    <div id='custom-alert'>
        <div id='custom-alert-box'>
            <div id='custom-alert-title'>¡Bienvenido Devuelta!</div>
            <div style='color:#333; margin-top:8px;'>Inicio de sesión exitoso.</div>
            <button id='custom-alert-btn'>Continuar</button>
        </div>
    </div>
    <script>
        document.getElementById('custom-alert-btn').onclick = function() {
            window.location.href = '/Mateados/views/Admin/index.php';
        };
    </script>
    ";
    exit();
} else {
    echo "
    <style>
        #custom-alert {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(59, 80, 59, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
        #custom-alert-box {
            background: #fff;
            border-radius: 16px;
            padding: 32px 24px;
            box-shadow: 0 4px 24px rgba(91,117,83,0.18);
            text-align: center;
            font-family: 'Roboto', sans-serif;
            min-width: 300px;
            border: 2px solid #c5d6b0;
        }
        #custom-alert-title {
            color: #5b7553;
            font-size: 1.5rem;
            margin-bottom: 8px;
            font-weight: 700;
            border-bottom: 2px solid #ffdd57;
            display: inline-block;
            padding-bottom: 4px;
        }
        #custom-alert-btn {
            margin-top: 18px;
            background: #5b7553;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s;
        }
        #custom-alert-btn:hover {
            background: #3e503b;
        }
    </style>
    <div id='custom-alert'>
        <div id='custom-alert-box'>
            <div id='custom-alert-title'>¡Bienvenido!</div>
            <div style='color:#333; margin-top:8px;'>Inicio de sesión exitoso.</div>
            <button id='custom-alert-btn'>Continuar</button>
        </div>
    </div>
    <script>
        document.getElementById('custom-alert-btn').onclick = function() {
            window.location.href = '/Mateados/views/pagprincipal/index.php';
        };
    </script>
    ";
    exit();
}
        } else {
            return "Usuario y contraseña incorrectos.";
        }
    }
}
