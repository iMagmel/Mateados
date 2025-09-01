<?php

class ConnectionBD{
    
    public static function Connection() {
        $host = "localhost";
        $dbname = "DBMATEADOS";
        $username = "";
        $password = "";
        $puerto = 1433;

        try {
            $conn = new PDO("sqlsrv:Server=$host,$puerto;Database=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $ex) {
            die("No se logró conectar con la base de datos: $dbname, error: " . $ex->getMessage());
        }

        return $conn;
    }
}
?>