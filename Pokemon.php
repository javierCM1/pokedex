<?php

class Pokemon
{
    private int $id;
    private string $uuid;
    private string $img;
    private string $nombre;
    private string $descripcion;
    private Tipo $tipo;

    public function __construct($id, $uuid, $img, $nombre, $descripcion, $tipo)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->img = $img;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getTipo(): Tipo
    {
        return $this->tipo;
    }

    public function setTipo(Tipo $tipo): void
    {
        $this->tipo = $tipo;
    }

}