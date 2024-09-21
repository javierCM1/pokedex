<?php

class AccesoDB
{
    private $conexion;

    public function __construct($server = "localhost", $usuario = "root", $pass = "", $database = "pokedex_db")
    {
        $this->conexion = new mysqli($server, $usuario, $pass, $database);
    }

    public function query($sql): mysqli_result|bool
    {
        return $this->conexion->query($sql);
    }

    public function __destruct()
    {
        $this->conexion->close();
    }
}