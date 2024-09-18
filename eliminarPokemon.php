<?php
//ARCHIVO TEMPORAL?
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);
$idPokemon = $_POST["idPokemon"] ?? 0;

$pokeNegocio->deletePokemon($idPokemon);
header("Location: index.php");
exit();