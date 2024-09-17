<?php
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);
$filtro = $_POST["filtroPokemon"];

$pokeNegocio->queryPokemonList($filtro);

header("Location: index.php?");
exit();