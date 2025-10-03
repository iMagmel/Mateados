<?php
require_once __DIR__ . "/CSignUp.php";

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $usuario = trim($_POST['usuario'] ?? '');
    $documento = trim($_POST['doc'] ?? '');
    $fecha_nacimiento = trim($_POST['fnacimiento'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['contraseña'] ?? '';
    $id_rol = 2;


    if (empty($nombre) || !preg_match('/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\s]+$/u', $nombre)) {
        $error = "El nombre es obligatorio";
    } elseif (empty($apellido) || !preg_match('/^[a-zA-ZÁÉÍÓÚÑáéíóúñ\s]+$/u', $apellido)) {
        $error = "El apellido es obligatorio";
    } elseif (empty($usuario) || strlen($usuario) < 4 || !preg_match('/^[a-zA-Z0-9_]+$/', $usuario)) {
        $error = "El nombre de usuario debe tener al menos 4 caracteres.";
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Debe ingresar un email válido.";
    } elseif (empty($password) || strlen($password) < 6) {
        $error = "La contraseña debe tener al menos 6 caracteres.";
    } elseif (empty($documento)) {
        $error = "Debe ingresar un número de documento.";
    } elseif (empty($fecha_nacimiento)) {
        $error = "La fecha de nacimiento es obligatoria.";
        } else {
        $fecha_obj = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);
        if (!$fecha_obj || $fecha_obj->format('Y-m-d') !== $fecha_nacimiento) {
            $error = "Formato de fecha inválido. Usá AAAA-MM-DD.";
        } else {    
            $hoy = new DateTime();
            $edad = $fecha_obj->diff($hoy)->y;
            if ($edad < 18) {
                $error = "Debés ser mayor de 18 años para registrarte.";
            }
        }
    }


        if (!preg_match('/^[0-9]{7,8}$/', $documento)) {
            $error = "El DNI debe tener entre 7 y 8 dígitos numéricos.";
        }
    
    
    if (empty($error)) {
        $registrar = new CSignUp();
        $resultado = $registrar->RegistrarUsuario(
            $nombre, $apellido, $documento,
            $fecha_nacimiento, $email, $usuario, 
            $password, $id_rol
        );

if ($resultado['registrado'] == 1) {
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
            <div id='custom-alert-title'>¡Registro exitoso!</div>
            <div style='color:#333; margin-top:8px;'>Ahora podés iniciar sesión.</div>
            <button id='custom-alert-btn'>Iniciar Sesion</button>
        </div>
    </div>
    <script>
        document.getElementById('custom-alert-btn').onclick = function() {
            window.location.href = '/Mateados/views/login/login.php';
        };
    </script>
    ";
    exit();
} else {
    $error = "El usuario o email ya están registrados.";
}


    
    }
}

require_once __DIR__ . '/../views/registro/signup.php';
?>
