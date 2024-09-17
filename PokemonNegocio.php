<?php
include "Tipo.php";
include "Pokemon.php";

class PokemonNegocio
{
    private $accesoDB;
    private Array $pokemonList;

    public function __construct(AccesoDB $accesoDB)
    {
        $this->accesoDB = $accesoDB;
        $this->pokemonList = Array();
    }

    public function addPokemon(Pokemon $pokemon): void
    {
        $sql = "INSERT INTO `pokemon` (`uuid_pokemon`, `img_pokemon`, `nombre_pokemon`, `descripcion_pokemon`, `id_tipo`) 
                VALUES ('". $pokemon->getUuid() ."','". $pokemon->getImg() ."','". $pokemon->getNombre() ."','". $pokemon->getDescripcion() ."','". $pokemon->getTipo()->getId() ."')";
        $this->accesoDB->query($sql);
    }

    public function deletePokemon(int $idPokemon): void
    {
        $sql = "DELETE FROM `pokemon` WHERE id_pokemon=".$idPokemon;
        $this->accesoDB->query($sql);
    }

    public function modifyPokemon(Pokemon $pokemon): void
    {
        $sql = "UPDATE `pokemon` SET `uuid_pokemon`='". $pokemon->getUuid() ."',`img_pokemon`='". $pokemon->getImg() ."',
                `nombre_pokemon`='". $pokemon->getNombre() ."',`descripcion_pokemon`='". $pokemon->getDescripcion() ."',
                `id_tipo`='". $pokemon->getTipo()->getId() ."' WHERE id_pokemon=".$pokemon->getId();
        $this->accesoDB->query($sql);
    }

    /**
     * @return array
     */
    public function getPokemonList(): array
    {
        return $this->pokemonList;
    }

    public function queryPokemonList($filtro): void
    {
        $sql = "SELECT * FROM pokemon P JOIN tipo T ON P.id_tipo=T.id_tipo WHERE ";
        if(isset($filtro))
            $sql .= "nombre_pokemon LIKE '%". $filtro ."%' OR descripcion_tipo LIKE '%". $filtro ."%'";
        else
            $sql .= 1;

        $listaTmp = $this->accesoDB->query($sql)->fetch_all(MYSQLI_ASSOC);

        foreach ($listaTmp as $item){
            $tipoTmp = new Tipo($item["id_tipo"],$item["descripcion_tipo"]);
            $pokeTmp = new Pokemon($item["id_pokemon"],
                $item["uuid_pokemon"],
                $item["img_pokemon"],
                $item["nombre_pokemon"],
                $item["descripcion_pokemon"],
                $tipoTmp);

            array_push($this->pokemonList,$pokeTmp);
        }
    }
}