<?php
namespace Sesion;

class SesionUsuario {
    private static $idUsuario;
    private static $nombre;
    private static $usuario;
    private static $idRol;

    public static function iniciarSesion($idUsuario, $nombre, $usuario, $idRol) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        self::$idUsuario = $idUsuario;
        self::$nombre = $nombre;
        self::$usuario = $usuario;
        self::$idRol = $idRol;

        $_SESSION["Id_Usuario"] = $idUsuario;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["Id_Rol"] = $idRol;
    }

    public static function cerrarSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        self::$idUsuario = null;
        self::$nombre = null;
        self::$usuario = null;
        self::$idRol = null;
    }

    public static function getIdUsuario() {
        return self::$idUsuario ?? $_SESSION["Id_Usuario"] ?? null;
    }

    public static function getNombre() {
        return self::$nombre ?? $_SESSION["nombre"] ?? null;
    }

    public static function getUsuario() {
        return self::$usuario ?? $_SESSION["usuario"] ?? null;
    }

    public static function getIdRol() {
        return self::$idRol ?? $_SESSION["Id_Rol"] ?? null;
    }
}
