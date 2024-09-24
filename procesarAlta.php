<?php
//ARCHIVO TEMPORAL?
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);

$nombre = isset($_POST['nombrePoke']) ? $_POST['nombrePoke'] : "";
$uuid = isset($_POST['numeroPoke']) ? $_POST['numeroPoke'] : "";
$img = isset($_POST['imgPoke']) ? "imagenes/" . $_POST['imgPoke'] : "imagenes/unknown.png";
$tipo = isset($_POST['tipoPokemon']) ? $_POST['tipoPokemon'] : 0;
$descripcion = isset($_POST['descripcionPoke']) ? $_POST['descripcionPoke'] : "";

$pokeNegocio->addPokemon($uuid,$img,$nombre,$descripcion,$tipo);

header("Location: vista-admin.php");
exit();