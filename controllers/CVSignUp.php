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
    echo "<script>
        alert('Registro exitoso. Ahora podés iniciar sesión.');
        window.location.href = '/Mateados/views/login/login.php';
    </script>";
    exit();
} else {
    $error = "El usuario o email ya están registrados.";
}


    
    }
}

require_once __DIR__ . '/../views/registro/signup.php';
?>
