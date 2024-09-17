<?php

class Tipo
{
    private int $id;
    private string $descripcion;

    public function __construct($id,$descripcion)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
}