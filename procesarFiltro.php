<?php
session_start();

include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);
$filtro = $_POST["filtroPokemon"];

$pokeNegocio->queryPokemonList($filtro);
$_SESSION["listaPokemon"] = $pokeNegocio->getPokemonList();

header("Location: index.php?");
exit();