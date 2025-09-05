<?php
require_once __DIR__ . "/../Sesion/SesionUsuario.php";

use Sesion\SesionUsuario;

SesionUsuario::cerrarSesion();

header("Location: ../views/login/login.php");
exit();
