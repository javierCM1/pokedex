<?php
//ARCHIVO TEMPORAL?
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);
$idPokemon = $_POST["idPokemonMod"] ?? 0;
$tipo = new Tipo(2,"Agua");
$poke = new Pokemon(9,uniqid(),"imagenes/logo.png","Lalalala","Otra descripcion",$tipo);

$pokeNegocio->modifyPokemon($poke);
header("Location: index.php");
exit();