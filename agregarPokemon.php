<?php
//ARCHIVO TEMPORAL?
include "AccesoDB.php";
include "PokemonNegocio.php";
include "Pokemon.php";
include "Tipo.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);
$tipo = new Tipo(2,"Agua");
$poke = new Pokemon(2,uniqid(),"/imagenes/logo.png","Lalala","Una descripcion",$tipo);

$pokeNegocio->addPokemon($poke);
header("Location: index.php");
exit();