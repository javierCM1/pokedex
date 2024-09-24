<?php

class PokemonNegocio
{
    private $accesoDB;

    public function __construct(AccesoDB $accesoDB)
    {
        $this->accesoDB = $accesoDB;
        $this->pokemonList = Array();
    }

    public function addPokemon($uuid_pokemon, $img_pokemon, $nombre, $descripcion_pokemon, $tipo): void
    {
        $sql = "INSERT INTO `pokemon` (`uuid_pokemon`, `img_pokemon`, `nombre_pokemon`, `descripcion_pokemon`, `id_tipo`) 
                VALUES ('". $uuid_pokemon ."','". $img_pokemon ."','". $nombre ."','". $descripcion_pokemon ."','". $tipo ."')";
        $this->accesoDB->query($sql);
    }

    public function deletePokemon(int $idPokemon): void
    {
        $sql = "DELETE FROM `pokemon` WHERE id_pokemon=".$idPokemon;
        $this->accesoDB->query($sql);
    }

    public function modifyPokemon($id_pokemon, $uuid_pokemon, $img_pokemon, $nombre, $descripcion_pokemon, $tipo): void
    {
        $sql = "UPDATE `pokemon` SET `uuid_pokemon`='". $uuid_pokemon ."',`img_pokemon`='". $img_pokemon ."',
                `nombre_pokemon`='". $nombre ."',`descripcion_pokemon`='". $descripcion_pokemon ."',
                `id_tipo`='". $tipo ."' WHERE id_pokemon=".$id_pokemon;
        $this->accesoDB->query($sql);
    }

    public function queryPokemonList($filtro): array
    {
        $sql = "SELECT * FROM pokemon P JOIN tipo T ON P.id_tipo=T.id_tipo WHERE ";
        if(isset($filtro))
            $sql .= "nombre_pokemon LIKE '%". $filtro ."%' OR descripcion_tipo LIKE '%". $filtro ."%'";
        else
            $sql .= 1;

        return $this->accesoDB->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarPokemonPorUUID($uuid)
    {
        $sql = "SELECT * FROM `pokemon` WHERE uuid_pokemon = '$uuid'";
        return $this->accesoDB->query($sql)->fetch_assoc();
    }
}