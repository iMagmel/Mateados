<?php
require_once __DIR__ . '/../session/SesionUsuario.php';
use Sesion\SesionUsuario;

SesionUsuario::cerrarSesion();
header("Location: /Mateados/views/login/login.php");
exit();

