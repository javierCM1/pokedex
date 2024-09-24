<?php
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);
$idPokemon = isset($_GET['id']) ? $_GET['id'] : 0;

$pokeNegocio->deletePokemon($idPokemon);
header("Location: vista-admin.php");
exit();