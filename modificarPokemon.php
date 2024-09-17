<?php
//ARCHIVO TEMPORAL?
include "AccesoDB.php";
include "PokemonNegocio.php";
include "Pokemon.php";
include "Tipo.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);
$tipo = new Tipo(2,"Agua");
$poke = new Pokemon(3,uniqid(),"imagenes/logo.png","Lalalala","Otra descripcion",$tipo);

$pokeNegocio->modifyPokemon($poke);
header("Location: index.php");
exit();