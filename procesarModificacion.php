<?php
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);

$id = isset($_POST['idPoke']) ? $_POST['idPoke'] : 0;
$nombre = isset($_POST['nuevoNombrePoke']) ? $_POST['nuevoNombrePoke'] : "";
$uuid = isset($_POST['nuevoNumeroPoke']) ? $_POST['nuevoNumeroPoke'] : "";
$img = isset($_POST['nuevaImgPoke']) ? "imagenes/" . $_POST['nuevaImgPoke'] : "imagenes/unknown.png";
$tipo = isset($_POST['nuevoTipoPokemon']) ? $_POST['nuevoTipoPokemon'] : 0;
$descripcion = isset($_POST['nuevaDescPoke']) ? $_POST['nuevaDescPoke'] : "";

if($pokeNegocio->buscarPokemonPorUUID($uuid) == null){
    $pokeNegocio->modifyPokemon(intval($id),$uuid,$img,$nombre,$descripcion,intval($tipo));
}

header('Location: vista-admin.php');
exit();