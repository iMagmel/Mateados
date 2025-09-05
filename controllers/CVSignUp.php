<?php
require_once __DIR__ . "/../models/models/DatosAuxiliares.php";
require_once __DIR__ . "/CSignUp.php";

$error = '';
$datosAux = new DatosAuxiliares();

$generos = $datosAux->obtenerGeneros();
$ubicaciones = $datosAux->obtenerUbicaciones();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $usuario = trim($_POST['usuario'] ?? '');
    $id_genero = (int) ($_POST['genero'] ?? 0);
    $documento = trim($_POST['doc'] ?? '');
    $fecha_nacimiento = trim($_POST['fnacimiento'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['contraseña'] ?? '';
    $id_localidad = (int) ($_POST['localidad'] ?? 0);
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
    } elseif (empty($sexo)) {
    $error = "Debe seleccionar un sexo.";
    } elseif ($datosAux->usuarioExiste($usuario)) {
    $error = "El nombre de usuario ya está registrado. Elegí otro.";
    } elseif ($id_genero <= 0) {
        $error = "Debe seleccionar un género.";
    } elseif ($id_tipo_doc <= 0) {
        $error = "Debe seleccionar un tipo de documento.";
    } elseif (empty($documento)) {
        $error = "Debe ingresar un número de documento.";
    } elseif ($id_localidad <= 0) {
        $error = "Debe seleccionar una localidad.";
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
        } else {
            $error = "Tipo de documento no reconocido.";
    
        }

    
    if (empty($error)) {
        $registrar = new CSignUp();
        $resultado = $registrar->RegistrarUsuario(
            $nombre, $apellido, $documento,
            $id_localidad, $id_genero,
            $fecha_nacimiento, $email, $usuario, $password, $id_rol, $registrado
        );

        if ($resultado === true) {
        header("Location: /Mateados/views/login/login.php");
        exit();            
        } else {
            $error = $resultado;
        }
    }
}

require_once __DIR__ . '/../views/registro/logup.php';
?>
