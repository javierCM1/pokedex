<?php
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);

$id = isset($_POST['idPoke']) ? $_POST['idPoke'] : 0;
$nombre = isset($_POST['nuevoNombrePoke']) ? $_POST['nuevoNombrePoke'] : 0;
$uuid = isset($_POST['nuevoNumeroPoke']) ? $_POST['nuevoNumeroPoke'] : 0;
$img = isset($_POST['nuevaImgPoke']) ? "imagenes/" . $_POST['nuevaImgPoke'] : 0;
$tipo = isset($_POST['nuevoTipoPokemon']) ? $_POST['nuevoTipoPokemon'] : 0;
$descripcion = isset($_POST['nuevaDescPoke']) ? $_POST['nuevaDescPoke'] : 0;

$pokeNegocio->modifyPokemon(intval($id),$uuid,$img,$nombre,$descripcion,intval($tipo));

header('Location: vista-admin.php');
exit();